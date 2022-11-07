<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Hamcrest\Type\IsNumeric;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;
use function PHPUnit\Framework\isNan;

class CategorieController extends Controller
{
    public function list(Request $request){
        $categories = Categorie::all()->groupBy('type');
        return response()->json($categories);
    }

    public function search(Request $request, $query){
        if(!empty($query)){
            if(strpos($query, ':') !== false){
                $type = (explode(':', $query))[0];
                $name = (explode(':', $query))[1];

                $categories = Categorie::where('name', 'like', '%'.$name.'%')
                            ->where('type', 'like', '%'.$type.'%')
                            ->get()
                            ->groupBy('type');

                return response()->json($categories);
            }   

            $categories = Categorie::where('name', 'like', '%'.$query.'%')->get()
                ->groupBy('type'); 

            return response()->json($categories);
        }
    }

    public function add(Request $request){
        if($this->isAdmin($request) !== true) return false;

        $validated = $this->check($request, [
            'name' => 'Required|string|unique:categories',
            'type' => 'Required|string'
        ]);
        $categorie = Categorie::create($validated);
        return response()->json($categorie, 200);
    }

    public function delete(Request $request, $id){
        if($this->isAdmin($request) !== true) return false;

        if(!is_numeric($id)) return response()->json('L\'id n\'est pas valide.', 403);
        
        $categorie = Categorie::find($id);

        if(empty($categorie)) return response()->json($this->ErrorJsonResponse(['La catégorie demandé n\'existe pas']));

        $categorie->delete();

        return response()->json('success');
    }

    public function update(Request $request){
        if($this->isAdmin($request) !== true) return false;
        $validated = $this->check($request, [
            'categorie_id' => 'int|required',
            'type' => 'string',
            'name' => 'string'
        ]);

        $categorie = Categorie::find($validated['categorie_id']);

        if(isset($validated['type']) and !empty($validated['type']))
            $categorie->type = $validated['type'];
        
        if(isset($validated['name']) and !empty($validated['name']))
            $categorie->name = $validated['name'];
        
        $categorie->save();

        return response()->json($categorie, 200);
    }
}
