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
            $table->string('selfservice_id',255);
            $table->date('date');
            $table->time('time_start');
            $table->time('time_end');
            $table->string('updated_at', 255);
            $table->string('created_at', 255);
            $table->primary('selfservice_id');
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
