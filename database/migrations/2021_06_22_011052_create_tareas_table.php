<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('id_proyecto');
            $table->integer('id_sprint');
            $table-> primary(['id','id_proyecto']);


            $table->foreign('id_proyecto') -> references('id') -> on('proyectos')->cascadeOnDelete();;
            $table->foreign('id_sprint') -> references('id') -> on('sprints');

            $table-> enum('estado',['pendiente','hecho', 'no hecho']) -> nullable(false);
            $table-> text('descripcion');
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
        Schema::dropIfExists('tareas');
    }
}
