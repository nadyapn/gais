<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ObServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('obService', function (Blueprint $table) {
            $table->increments('kodeOBS');
            $table->date('date');
            $table->time('batch');
            $table->text('detail');
            $table->string('employee_id',30);
            $table->string('ob_id',30);
            $table->foreign('employee_id')->references('id_employee')->on('employee')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('ob_id')->references('id_employee')->on('employee')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::drop('obService');
    }
}
