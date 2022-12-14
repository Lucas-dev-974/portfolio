<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Medias;
use App\Models\Project;
use App\Models\ProjectCategorie;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['list', 'one']]);
    }

    private function getCategorie($projectid){
        $categories = [];

        $linkedCategProject = ProjectCategorie::where(['project_id' => $projectid])->with('categorie')->get();

        foreach($linkedCategProject as $categorie){
            $categorie->categorie['relation_id'] = $categorie->id;
            array_push($categories, $categorie->categorie);
        }

        return $categories;
    }

    public function list(Request $request){
        $validated = $this->check($request, [
            'number_items' => 'int' 
        ]);

        $number_items = 5;

        if(sizeof($validated) > 0) $number_items = $validated['number_items'];

        $projects = Project::paginate($number_items);

        foreach($projects as $project){
            if(!empty($project['description']))
                $project['description'] = substr($project['description'], 0, 85) . ' ...';

            $project['categories'] = $this->getCategorie($project->id);
        }

        return response()->json($projects);
    }

    public function  listByCategorie(Request $request){
        $validated = $this->check($request, [
            'categorie_id' => 'required'
        ]);

        $categ = ProjectCategorie::where(['categorie_id' => $validated['categorie_id']])
                ->with('project')
                ->get();


        $projects = [];


        foreach($categ as $categ_project){
            $project = $categ_project['project'];
            $project['categories'] = $this->getCategorie($project['id']);
            if(!empty($project['description']))
                $project['description'] = substr($project['description'], 0, 85) . ' ...';
            array_push($projects, $project);
        }

        return response()->json($projects);
    }

    public function one(Request $request, $id){
        if(!is_numeric($id)) return response()->json('L\'id n\'est pas valide.', 403);

        $project = Project::find($id);

        if(!$project) return response()->json([
            "message" => 'Le projet n\'existe pas !'
        ], 404);

        $project['categories'] = $this->getCategorie($project->id);
        

        $medias = Medias::where(['type' => 'project', 'target_id' => $project->id])->get();
        
        $medias_ = [];
        array_push($medias_ , $project->preview_img_path);


        foreach($medias as $media){
            array_push($medias_ , $media->uri);
        }
        
        $project['medias']     = $medias_;
        return response()->json($project);
    }

    public function create(Request $request){
        if($this->isAdmin($request) !== true) return false;
        // abort(response()->json($request->input('file')));
        
        $validated = $this->check($request, [
            'name' => 'required|string|max:50',
            'description' => 'string|max:1500',
            'git_url' => 'url',
            'file' => 'file',
            'demo_url' => 'url'
        ]);

        
        // Sauvegarde du fichier 
        if(sizeof($request->file()) > 0){
            $paths = [];
            foreach($request->file() as $file){
                $paths += [$this->storeFile($request, $file)];            
            }

            $validated['preview_img_path'] =  $paths[0]->uri;
        }   

        $project = Project::create([
            ...$validated,
            'user_id' => $request->user()->id,
        ]);

        return response()->json($project);
    }

    public function update(Request $request){
        if($this->isAdmin($request) !== true) return false;
        
        $validated = $this->check($request, [
            'name' => 'string|max:50',
            'description' => 'string|max:1500',
            'git_url' => 'url',
            'demo_url' => 'url',
            'project_id' => 'required|int'
        ]);

        $project = Project::find($validated['project_id']);

        if(!$this->checkAutority($request, $project['user_id']))
            return response()->json('Vous n\'avez pas le droit de modification sur ce projet');

        foreach($validated as $property => $value){
            if($property != 'project_id')
                if($value != $project[$property]) $project[$property] = $value;
        }

        $project->save();

        return response()->json($project);
    }

    public function delete(Request $request){
        
    }

    public function assignCateg(Request $request){
        $validated = $this->check($request, [
            'project_id' => 'required|int', 
            'categorie_id' => 'required|int'
        ]);

        $alreadyAssigned = ProjectCategorie::where($validated)->first();


        if($alreadyAssigned) return response()->json('La cat??gorie est d??j?? assign?? ?? ce projet', 400); 

        $post = Project::find($validated['project_id']);

        if(empty($post)) return response()->json(['messages' => [
            'l\'article n\'existe pas/plus'
        ]], 403);
        

        if(!$this->checkAutority($request, $post->user_id)){
            return response()->json('Vous n\'??te pas autoriser ?? effectuer cet action !', 401);
        }   

        $categ = Categorie::find($validated['categorie_id']);

        if(empty($categ)) return response()->json(['messages' => [
            'la cat??gorie n\'existe pas'
        ]], 403);

        try{
            $assignation = ProjectCategorie::create($validated);
            return response()->json($assignation, 200);
        }catch(Error $error){
            return response()->json('Il s\'emblerais qu\'un probl??me est survenue veuillez r??essayer plus tard');
        }        
    }

    public function removeCateg(Request $request){
        $validated = $this->check($request, [
            'assignation_id' => 'required|int'
        ]);

        $assignation = ProjectCategorie::find($validated['assignation_id']);
        if(!$assignation) return response()->json('Impossible d\'effectuer cet action !', 400);

        $assignation = $assignation->with('project')->first();
        
        if($this->checkAutority($request, $assignation['project']['user_id'])){
            try{
                $assignation->delete();
                return response()->json('success', 200);
            }catch(Error $error){
                return response()->json('failed', 400);
            }
            
        }else{
            return response()->json('Impossible d\'effectuer cet action, vous n\'??tes pas l\'auteur du post !', 401);
        }
    }

    public function add_medias(Request $request){
        $validated = $this->check($request, [
            'project_id' => 'int|exists:projects,id',
            'file' => 'file|required',
        ]);

        
        $medias = Medias::create([
            'name' => 'file'
        ]);

        return response()->json();
    }

    public function remove_medias(Request $request){
        return response()->json();
    }
}
