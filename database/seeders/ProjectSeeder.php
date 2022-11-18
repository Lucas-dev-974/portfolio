<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project = \App\Models\Project::create([
            'name' => 'Wordle',
            'git_url' => 'https://github.com/Lucas-dev-974/Wordle-game',
            'description' => 'Wordle est un jeux de mot ou le but et de retrouver le bon mot choisi par le système, 
                             la liste de mot contient des mot à 5 charactère, le joueur n\'a que 6 essais 
                             pour réusir à trouver le bon mot.',
            'preview_img_path' => '/project_imgs/wordle/in-game.PNG',
            'demo_url' => '/wordle',
            'public' => true,
            'user_id' => 1
        ]);

        \App\Models\Medias::create([
            'name' => 'interace',
            'uri'  => '/project_imgs/wordle/interface.png',
            'target_id' => $project->id,
            'type'      => 'project'
        ]);


    }   
}
