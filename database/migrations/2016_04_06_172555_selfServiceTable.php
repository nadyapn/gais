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
<<<<<<< HEAD
            $table->increments('kodeSS');
=======
            $table->string('kodeSS', 30);
>>>>>>> f717c27a566d6246a77f0362ac191395495ef0dc
            $table->string('employee_id', 30);
            $table->timestamp('request_date');
            $table->timestamp('approval_date');
            $table->text('description');
            $table->tinyInteger('status');
<<<<<<< HEAD
            $table->foreign('employee_id')->references('id_employee')->on('employee')->onDelete('cascade')->onUpdate('cascade');
=======
            $table->primary('kodeSS');
            $table->foreign('employee_id')->references('id_employee')->on('employee')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::drop('selfservice');
    }
}
