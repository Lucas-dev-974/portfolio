<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id', 'categorie_id', 'id'
    ];

    public function categorie($article_id = 0){
        $categories = $this->all()->where(['post_id' => $this->id])
            ->leftJoin('categories', 'categories.id', '=', $this->article_id)
            ->get();
        
        return $categories;
    }
}
