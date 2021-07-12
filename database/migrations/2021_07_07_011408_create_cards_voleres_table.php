<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsVoleresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards_voleres', function (Blueprint $table) {
            $table->integer('id') -> autoIncrement();
            $table->integer('id_project');
            $table->foreign('id_project')->references('id')->on('proyectos')->cascadeOnDelete();
            $table->string('rurs');
            $table->integer('number');
            $table->string('name');
            $table->string('desc');
            $table->string('type');
            $table->string('state');
            $table->string('priority');
            $table->string('stability');
            $table->string('measure');
            $table->string('scale');
            $table->date('date');
            $table->time('time');
            $table->integer('increment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards_voleres');
    }
}
