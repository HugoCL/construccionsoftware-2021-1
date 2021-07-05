<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {

            /**
             * Cambie de id() a integer(), para poder tener una foreign key desde la tabla "dirige", ya que
             * si se define un id() despues no se puede puede asignar otra primary key en "dirige"
             */
            $table->integer('id')->autoIncrement();
            $table->string('nombre');
            $table->text('descripcion');
            $table->date('fechaInicio');
            $table->date('fechaTermino');
            $table->string('metodologia');
            $table->integer('cantIteraciones');
            $table->integer('duracionIteraciones');
            $table->string('medidaIteracion');
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
        Schema::dropIfExists('proyectos');
    }
}
