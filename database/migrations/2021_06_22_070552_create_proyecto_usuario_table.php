<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectoUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dirige', function (Blueprint $table) {

            $table->integer('id_proyecto');
            $table->string('id_usuario');

            $table->primary(['id_proyecto','id_usuario']);

            $table->foreign('id_proyecto')->references('id')->on('proyectos');
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
        Schema::dropIfExists('dirige');
    }
}
