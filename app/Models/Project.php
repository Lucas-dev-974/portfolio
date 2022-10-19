<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'name', 'git_url', 'demo_url',
        'description', 'preview_img_path'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categorie(){
        // return $this->leftJoin('project_categories', $this->id, '=', 'project_categories.project_id');
    }
}
