<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->integer('id')
                ->nullable(false)
                ->change()
                ->primary()
                ->constrained();
            $table-> enum('estado',['pendiente','hecho', 'no hecho'])
->nullable(false)
                ->change();
$table->text('estado')->nullable(false)->change();
$table-> text('descripcion')
    ->nullable(false)
    ->change();
$table->integer('id_proyecto')
    ->unsigned();
$table->foreign('id_proyecto')
    ->references('pk_id')
    ->on('proyecto')
    ->onDelete('cascade');

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
        Schema::dropIfExists('tareas');
    }
}
