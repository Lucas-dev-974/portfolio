<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Post;
use App\Models\PostCategorie;
use DateTime;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api', ['except' => ['posts']]);
    }

    public function posts(Request $request){
        $posts = Post::where(['public' => 1])->with('categories')->cursorPaginate(15);
        return response()->json($posts);
    }

    public function post(Request $request){
        $validated = $this->check($request, ['post_id' => 'required|int']);
        
        try{
            $post = Post::find($validated['post_id'])->with('user')->with('categories')->first();
            return response()->json($post, 200);
        }catch(Error $error){
            return response()->json('Impossible d\'effectuer cet action, vous n\'êtes pas l\'auteur du post !', 401);
        }
    }

    public function create(Request $request){
        $validated = $this->check($request, [
            'title' => 'required|string',
            'content' => 'required|string|min:15',
            'public' => 'boolean'
        ]);
        

        
        $post_datas = [
            ...$validated,
            'publication_date' => date_create()->format('Y-m-d H:i:s'),
            'user_id' => $request->user()->id,
        ];

        $post = Post::create([...$post_datas]);        

        return response()->json($post,  201);
    }

    public function delete(Request $request){
        $validated = $this->check($request, [
            'post_id' => 'required'
        ]);

        $post = Post::find($validated['post_id']);
        if(empty($post)) return response()->json(
            $this->ErrorJsonResponse(['l\'article n\'existe pas/plus']), 
            403
        );

        if(!$this->checkAutority($request, $post->user_id)){
            return response()->json('Vous n\'ête pas autoriser à effectuer cet action !', 401);
        }   

        try{
            $post->delete();
        }catch(Error $error){
            return response()->json('quelque chose c\'est mal passé veuillez contacter l\'admin', 500);
        }

        return response()->json($post, 200);   
    }

    public function update(Request $request){
        $validated = $this->check($request, [
            'title' => 'string|min:3',
            'content' => 'string',
            'public'  => 'boolean',
            'post_id' => 'required|int'
        ]);

        $post = Post::find($validated['post_id']);

        if(empty($post)) return response()->json(['messages' => [
            'l\'article n\'existe pas/plus'
        ]], 403);
        

        if(!$this->checkAutority($request, $post->user_id)){
            return response()->json('Vous n\'ête pas autoriser à effectuer cet action !', 401);
        }   

        foreach($validated as $key => $value){
            if(in_array($key, $post->updatableFields())){
                $post[$key] = $value;
                $post->save();
            }
        }

        return response()->json('success', 200);
    }

    public function assignCateg(Request $request){
        $validated = $this->check($request, [
            'post_id' => 'required|int', 
            'categorie_id' => 'required|int'
        ]);

        $alreadyAssigned = PostCategorie::where($validated)->first();


        if($alreadyAssigned) return response()->json('La catégorie est déjà assigné à cet article', 400); 

        $post = Post::find($validated['post_id']);

        if(empty($post)) return response()->json(['messages' => [
            'l\'article n\'existe pas/plus'
        ]], 403);
        

        if(!$this->checkAutority($request, $post->user_id)){
            return response()->json('Vous n\'ête pas autoriser à effectuer cet action !', 401);
        }   

        $categ = Categorie::find($validated['categorie_id']);

        if(empty($categ)) return response()->json(['messages' => [
            'la catégorie n\'existe pas'
        ]], 403);

        try{
            $assignation = PostCategorie::create($validated);
            return response()->json($assignation, 200);
        }catch(Error $error){
            return response()->json('Il s\'emblerais qu\'un problème est survenue veuillez réessayer plus tard');
        }        
    }

    public function removeCateg(Request $request){
        $validated = $this->check($request, [
            'assignation_id' => 'required|int'
        ]);

        $assignation = PostCategorie::find($validated['assignation_id']);
        if(!$assignation) return response()->json('Impossible d\'effectuer cet action !', 400);

        $assignation = $assignation->with('post')->first();
        
        
        if($this->checkAutority($request, $assignation['post']['user_id'])){
            try{
                $assignation->delete();
                return response()->json('success', 200);
            }catch(Error $error){
                return response()->json('failed', 400);
            }
            
        }else{
            return response()->json('Impossible d\'effectuer cet action, vous n\'êtes pas l\'auteur du post !', 401);
        }
        
    }
}
