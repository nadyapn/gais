<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PaidLeaveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('paidleave', function (Blueprint $table) {
            $table->string('selfservice_id', 30);
            $table->timestamp('date_hired');
            $table->integer('period_of_leave');
            $table->string('category',30);
            $table->integer('total_leave');
            $table->primary('selfservice_id');
            $table->foreign('selfservice_id')->references('kodeSS')->on('selfservice')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::drop('paidleave');
    }
}
