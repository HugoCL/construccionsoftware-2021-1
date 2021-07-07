<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntegrantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integrants', function (Blueprint $table) {
            $table->integer('id_project');
            $table->string('id_user');

            $table->foreign('id_project')->references('id')->on('proyectos')->cascadeOnDelete();
            $table->foreign('id_user')->references('correo')->on('usuarios')->cascadeOnDelete();

            $table->string('rol');

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
        Schema::dropIfExists('integrants');
    }
}
