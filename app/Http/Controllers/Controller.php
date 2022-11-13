<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Project;

use App\Models\Medias;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function check(Request $request, $to_check){
        $validator = Validator::make($request->all(), $to_check);
        if($validator->fails()) {
            abort(response()->json($validator->failed(), 400));
            return false;
        ;}
        return $validator->validated();
    }

    /**
     * @info Vas vérifier si lors d'une demande de suppresion/modification le demandeur et bien le posseuseur de l'entité 
     *       ou si il à les droit de suppression/modification sur cet entité
     * @param target_user_id Refère à l'id utilisateur provenant de la ressource ou l'on souhaite effectuer l'action !
     */
    public function checkAutority(Request $request, $target_user_id){
        if($request->user()->id != $target_user_id){
            return false;
        }
        return true;
    }

    public function ErrorJsonResponse($errors_msg){
        return [
            'messages' =>  $errors_msg,
            'status'   => 'serveur-erreur'
        ];
    }

    public function isAdmin(Request $request){
        if($request->user()->role == 1) return true;
        return abort(response()->json([
            "messages" => 'Vous n\'avez pas l\'autorisation'
        ], 401));
    }

    public function storeFile(Request $request, $file){

        $app_path = storage_path('app/public');
        $user_store_path = $app_path . '/user-' . str($request->user()->id);    

        if(!File::isDirectory($user_store_path)){
            File::makeDirectory($user_store_path, 0777, true, true);
            File::makeDirectory($user_store_path . '/projects', 0777, true, true);
            File::makeDirectory($user_store_path / '/posts', 0777, true, true);
        }

        $path = Storage::disk('public')->put('user-' . $request->user()->id, $request->file('file'));
  

        $media = $this->saveFile($request, $path, $file);
        return $media;
    }

    public function deleteFile($path){
        $dir = Storage::path($path);
        if(!empty($dir)){
            if(File::exists($path)){
                unlink($path);
            }
        };

    }

    public function saveFile(Request $request, $path, $file){
        $entity = Project::latest()->first();
        
        $media_data = [     
            'name' => $file->getClientOriginalName(),
            'uri' => $path,
            'target_id' => isset($entity) ? ($entity->id + 1) : 1,
            'type' => null
        ];

        if(strpos($_SERVER['REQUEST_URI'], 'project')) {
            $media_data['type'] = 'project';
        }

        if(strpos($_SERVER['REQUEST_URI'], 'post')) {
            $media_data['type'] = 'post';
        }

        $entity_ = Medias::create([...$media_data]);
        return $entity_;

    }


}
