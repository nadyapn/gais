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
            $table->string('kodeSS',255);
            $table->string('employee_id', 255);
            $table->timestamp('request_date');
            $table->timestamp('approval_date');
            $table->text('description');
            $table->tinyInteger('status');
            $table->text('message')->nullable;
            $table->string('updated_at', 255);
            $table->string('created_at', 255);
            $table->primary('kodeSS');
            $table->foreign('employee_id')->references('id_employee')->on('employee')->onDelete('cascade')->onUpdate('cascade');
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
