<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'name',  'type'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function posts(){
        return $this->hasMany(PostCategorie::class);
    }

    public function project(){
        return $this->hasMany(ProjectCategorie::class);
    }
}
