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
        Schema::create('employee', function (Blueprint $table) {
            $table->string('id_employee', 255);
            $table->string('name', 255);
            $table->string('email', 255);
            $table->string('password', 255);
            $table->string('division', 255);
            $table->string('position', 255);
            $table->string('role', 255);
            $table->string('supervisor', 255)->nullable();
            $table->string('remember_token', 255);
            $table->string('updated_at', 255);
            $table->string('created_at', 255);
            $table->primary('id_employee');
            $table->unique('email');
            $table->foreign('supervisor')->references('id_employee')->on('employee')->onDelete('cascade')->onUpdate('cascade');
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
