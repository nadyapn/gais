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
<<<<<<< HEAD
            $table->increments('kodeOBS');
=======
            $table->string('kodeOBS', 30);
>>>>>>> f717c27a566d6246a77f0362ac191395495ef0dc
            $table->date('date');
            $table->time('batch');
            $table->text('detail');
            $table->string('employee_id',30);
            $table->string('ob_id',30);
<<<<<<< HEAD
            $table->foreign('employee_id')->references('id_employee')->on('employee')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ob_id')->references('id_employee')->on('employee')->onDelete('cascade')->onUpdate('cascade');
=======
            $table->primary('kodeOBS');
            $table->foreign('employee_id')->references('id_employee')->on('employee')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('ob_id')->references('id_employee')->on('employee')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::drop('obService');
    }
}
