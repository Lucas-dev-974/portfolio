<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;

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
}
