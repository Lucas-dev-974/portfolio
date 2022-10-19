<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id', 'categorie_id', 'id'
    ];  

    public function post(){
        return $this->belongsTo(Post::class);
    }

}
