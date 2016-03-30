<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('employee', function (Blueprint $table) {
            $table->string('id_employee');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('division');
            $table->string('postition');
            $table->string('role');
            $table->string('supervisor');
            $table->primary('id_employee');
            $table->foreign('supervisor')->references('id_employee')->on('employee')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::drop('employee');
    }
}
