<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReferencesprintToTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            //
            $table->integer('id_sprint')->nullable(true);
            $table->foreign('id_sprint')->references('id')->on('sprints');
            //$table->dropColumn('id_sprint');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            //
            //$table->integer('id_sprint')->default(0);
            //$table->foreign('id_sprint')->references('id')->on('sprints');

        });
    }
}
