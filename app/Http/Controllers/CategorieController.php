<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function add(Request $request){
        $validated = $this->check($request, [
            'name' => 'Required|string|unique:categories',
            'type' => 'Required|string'
        ]);
        $categorie = Categorie::create($validated);
        return response()->json($categorie, 200);
    }
}
