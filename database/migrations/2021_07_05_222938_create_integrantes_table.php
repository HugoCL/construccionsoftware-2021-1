<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntegrantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integrantes', function (Blueprint $table) {
            $table->integer('id_equipo');
            $table->integer('id_proyecto');
            $table->string('id_user');
            $table->string('rol');
            $table->foreign('id_user')->references('correo')->on('usuarios')->cascadeOnDelete();
            $table->foreign('id_proyecto')->references('id')->on('proyectos')->cascadeOnDelete();
            $table->foreign('id_equipo')->references('id')->on('equipo')->cascadeOnDelete();
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
        Schema::dropIfExists('integrantes');
    }
}
