<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('peminjaman', function (Blueprint $table) {
<<<<<<< HEAD
            $table->string('kodePinjam');
=======
            $table->string('kodePinjam', 30);
>>>>>>> f717c27a566d6246a77f0362ac191395495ef0dc
            $table->timestamp('request_date');
            $table->date('used_date');
            $table->time('time_start');
            $table->time('time_end');
            $table->tinyInteger('status');
            $table->string('employee_id', 30);
            $table->string('facilities_id', 30);
<<<<<<< HEAD
            $table->primary(['facilities_id','kodePinjam']);
            $table->foreign('employee_id')->references('id_employee')->on('employee')->onDelete('cascade')->onUpdate('cascade');
=======
            $table->primary(['kodePinjam','facilities_id']);
            $table->foreign('employee_id')->references('id_employee')->on('employee')->onDelete('restrict')->onUpdate('cascade');
>>>>>>> f717c27a566d6246a77f0362ac191395495ef0dc
            $table->foreign('facilities_id')->references('kode')->on('facilities')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('peminjaman');
    }
}
