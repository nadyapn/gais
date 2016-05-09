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
            $table->string('kodePinjam',255);
            $table->timestamp('request_date');
            $table->date('used_date');
            $table->time('time_start');
            $table->time('time_end');
            $table->tinyInteger('status');
            $table->text('description');
            $table->string('employee_id', 255);
            $table->string('facilities_id', 255);
            $table->string('updated_at', 255);
            $table->string('created_at', 255);
            $table->primary(['facilities_id','kodePinjam']);
            $table->foreign('employee_id')->references('id_employee')->on('employee')->onDelete('cascade')->onUpdate('cascade');
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
