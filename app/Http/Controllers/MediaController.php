<?php

namespace App\Http\Controllers;

use App\Models\Medias;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    // Dans le .env changer SYSTEM_DISK=local env SYSTEM_DISK=public
    public function get(Request $request){
        $validated = $this->check($request, [
            'path' => 'string|required'
        ]);
        
        return Storage::download($validated['path']);
    }

    public function delete(Request $request){
        $validated = $this->check($request, [
            'media_id' => 'string|required',
        ]);

        $media =  Medias::find($validated['media_id']);

        if(!$this->checkAutority($request, $media->user_id)) 
            return response()->json('Vous n\'avez pas l\'authorisation', 401);

        
        $this->deleteFile($validated['path']);
        // return Storage::download($validate   d['path']);
    }
}
