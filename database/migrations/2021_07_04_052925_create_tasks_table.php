<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->integer('id') -> autoIncrement();
            $table->integer('id_proyecto');
            $table->foreign('id_proyecto') -> references('id') -> on('proyectos')->cascadeOnDelete();
            $table->integer('id_sprint')->nullable(true);
            $table->foreign('id_sprint')->references('id')->on('sprints');
            $table->string('name');
            $table->text('desc');
            $table->date('date');
            $table->text('members');
            $table-> enum('estado', ['pendiente','hecho', 'no hecho']) -> nullable(false);
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
        Schema::dropIfExists('tasks');
    }
}
