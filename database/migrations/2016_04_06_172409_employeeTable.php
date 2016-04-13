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
            $table->string('id_employee', 30);
            $table->string('name', 30);
            $table->string('email', 30);
            $table->string('password', 30);
            $table->string('division', 30);
            $table->string('position', 30);
            $table->string('role', 30);
<<<<<<< HEAD
            $table->string('supervisor', 30)->nullable();
            $table->primary('id_employee');
            $table->unique('email');
            $table->foreign('supervisor')->references('id_employee')->on('employee')->onDelete('cascade')->onUpdate('cascade');
=======
            $table->string('supervisor', 30);
            $table->primary('id_employee');
            $table->unique('email');
            $table->foreign('supervisor')->references('id_employee')->on('employee')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::drop('employee');
    }
}
