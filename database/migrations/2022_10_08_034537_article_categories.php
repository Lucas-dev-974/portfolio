<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_categories', function(Blueprint $table){
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('categorie_id');

            $table->foreignKey('post_id')->references('id')->on('posts');
            $table->foreignKey('categorie_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_categories'); 
    }
};
