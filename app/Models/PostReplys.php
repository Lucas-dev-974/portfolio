<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'author', 'content', 'article_id', 'publication_date'
    ];

    public function ArticleParent(){
        $this->belongsTo(Article::class);
    }
}
