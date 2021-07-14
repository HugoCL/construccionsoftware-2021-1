<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSprintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sprints', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_proyecto');
            //Aqui se agrega el nro_sprint el cual es un identificador cualquiera
            //La idea es que incluso podria ser un texto
            $table->string('nombre_sprint');

            //Se agrego el cascade
            $table->foreign('id_proyecto') -> references('id') -> on('proyectos')->cascadeOnDelete();
            $table->date('fechaInicio');
            $table->date('fechaTermino');
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
        Schema::dropIfExists('sprints');
    }
}
