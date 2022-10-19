<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'title', 'user_id', 'content', 'publication_date', 'public'
    ];

    public function updatableFields(){
        return ['title', 'content', 'public'];
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function replys(){
        return $this->hasMany(ArticleReply::class);
    }

    public function categories(){
        return $this->hasMany(PostCategorie::class)->join('categories', 'categories.id', '=', 'post_categories.categorie_id');
    }

    public function PostCategorie(){
        return $this->hasMany(PostCategorie::class);
    }
}
