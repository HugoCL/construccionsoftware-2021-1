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

            $table->primary(['id','id_proyecto']);

            $table->foreign('id_proyecto') -> references('id') -> on('proyectos');
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
