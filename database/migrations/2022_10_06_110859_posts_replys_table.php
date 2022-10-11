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
        Schema::create('posts_replys', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('article_id');
            $table->longText('content');
            $table->dateTime('publication_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts_replys');
    }
};
