<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_tasks', function (Blueprint $table) {
            $table->integer('id_project');
            $table->integer('id_task');
            $table->string('id_user');

            $table->primary(['id_project','id_task','id_user']);

            $table->integer('duracion');

            $table->foreign(['id_task','id_project'])->references(['id','id_proyecto'])->on('tareas');
            $table->foreign('id_user')->references('correo')->on('usuarios');

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
        Schema::dropIfExists('work_tasks');
    }
}
