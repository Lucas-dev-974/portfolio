<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'name', 'git_url', 'demo_url',
        'description', 'preview_img_path'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categorie(){
        return $this->hasMany(Categorie::class);
    }
}
