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
            $table->string('kodeOBS',255);
            $table->date('date');
            $table->time('batch');
            $table->text('detail');
            $table->string('employee_id',255);
            $table->string('ob_id',255);
            $table->string('updated_at', 255);
            $table->string('created_at', 255);
            $table->foreign('employee_id')->references('id_employee')->on('employee')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ob_id')->references('id_employee')->on('employee')->onDelete('cascade')->onUpdate('cascade');
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
