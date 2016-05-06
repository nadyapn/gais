<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OvertimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('overtime', function (Blueprint $table) {
            $table->increments('selfservice_id');
            $table->date('date');
            $table->time('time_start');
            $table->time('time_end');
            $table->foreign('selfservice_id')->references('kodeSS')->on('selfservice')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('overtime');
    }
}
