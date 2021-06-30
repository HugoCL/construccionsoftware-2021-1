<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class CreateGraphProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graph_projects', function (Blueprint $table) {
            $table->integer('id');
            $table->foreign('id_proyecto') -> references('id') -> on('proyectos');
            $table->foreign('id_tarea') -> references('id') -> on('tarea');
            $table->foreign('estado_proyecto') -> references('estado') -> on('proyecto');
            $table->foreign('estado_tarea') -> references('estado') -> on('tarea');


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
        Schema::dropIfExists('graph_projects');
    }
}
