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
            $table->integer('id');
            $table->integer('id_proyecto');
            $table->integer('nro_sprint');

            $table->primary(['id','id_proyecto']);


            $table->date('fechaInicio');
            $table->date('fechaTermino');
            $table->timestamps();
        });
        Schema::table('sprints', function($table) {
            $table->foreign('id_proyecto')->references('id')->on('proyectos');
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
