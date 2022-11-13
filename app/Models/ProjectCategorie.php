<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCategorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id', 'categorie_id'
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
}
