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
        Schema::create('projects', function(Blueprint $table){
           $table->id();
           $table->unsignedBigInteger('user_id');
           $table->string('name', 75);
           $table->string('git_url', 125)->nullable();
           $table->string('demo_url', 125)->nullable();
           $table->longText('description')->nullable();
           $table->string('preview_img_path')->nullable();
           $table->boolean('public')->default(false);
           $table->timestamps();
           
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
