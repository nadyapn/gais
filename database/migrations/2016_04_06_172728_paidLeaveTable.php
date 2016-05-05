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
            $table->string('selfservice_id',255);
            $table->date('date_hired');
            $table->string('period_of_leave',255);
            $table->string('category',255);
            $table->integer('total_leave');
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
        Schema::drop('paidleave');
    }
}
