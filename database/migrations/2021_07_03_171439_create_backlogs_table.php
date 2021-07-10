<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBacklogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('backlogs', function (Blueprint $table) {
            $table->text('nombre');
            $table->integer('id');
            $table->integer('id_proyecto');
            $table->primary(['id', 'id_proyecto']);
            //$table->integer('id_tarea');
            $table->foreign('id_proyecto')->references('id')->on('proyectos');
            // $table->foreign('id_tarea')->references('id')->on('tareas');
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
        Schema::dropIfExists('backlogs');
    }
}
