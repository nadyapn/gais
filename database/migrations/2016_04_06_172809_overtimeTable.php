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
<<<<<<< HEAD
            $table->increments('selfservice_id');
            $table->date('date');
            $table->time('time_start');
            $table->time('time_end');
            $table->foreign('selfservice_id')->references('kodeSS')->on('selfservice')->onDelete('cascade')->onUpdate('cascade');
=======
            $table->string('selfservice_id', 30);
            $table->timestamp('date');
            $table->time('time_start');
            $table->time('time_end');
            $table->primary('selfservice_id');
            $table->foreign('selfservice_id')->references('kodeSS')->on('selfservice')->onDelete('restrict')->onUpdate('cascade');
>>>>>>> f717c27a566d6246a77f0362ac191395495ef0dc
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
