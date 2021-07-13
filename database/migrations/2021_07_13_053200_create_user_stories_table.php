<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_stories', function (Blueprint $table) {
            //$table->id();
            $table->integer('id')->autoIncrement();
            $table->integer('id_project');
            $table->foreign('id_project')->references('id')->on('proyectos')->cascadeOnDelete();
            $table->string('code');
            $table->string('owner');
            $table->string('action');
            $table->string('result');
            $table->integer('increment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_stories');
    }
}
