<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'title', 'author', 'content', 'publication_date'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function replys(){
        return $this->hasMany(ArticleReply::class);
    }

    public function categories(){
        return $this->hasMany(CategoriesArticle::class);
    }
}
