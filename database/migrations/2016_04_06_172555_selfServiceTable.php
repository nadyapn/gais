<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SelfServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('selfservice', function (Blueprint $table) {
            $table->increments('kodeSS');
            $table->string('employee_id', 30);
            $table->timestamp('request_date');
            $table->timestamp('approval_date');
            $table->text('description');
            $table->tinyInteger('status');
            $table->foreign('employee_id')->references('id_employee')->on('employee')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::drop('selfservice');
    }
}
