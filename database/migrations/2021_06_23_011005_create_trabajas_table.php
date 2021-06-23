<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajas', function (Blueprint $table) {
            $table->integer('id_proyecto');
            $table->integer('id_tarea');
            $table->string('id_usuario');

            $table->primary(['id_proyecto','id_tarea','id_usuario']);

            $table->integer('duracion');

            $table->foreign(['id_tarea','id_proyecto'])->references(['id','id_proyecto'])->on('tareas');
            $table->foreign('id_usuario')->references('correo')->on('usuarios');

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
        Schema::dropIfExists('trabajas');
    }
}
