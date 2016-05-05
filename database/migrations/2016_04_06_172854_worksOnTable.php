<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WorksOnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('works_on', function (Blueprint $table) {
            $table->string('id_employee', 255);
            $table->string('id_project', 255);
            $table->string('updated_at', 255);
            $table->string('created_at', 255);
            $table->primary(['id_employee','id_project']);
            $table->foreign('id_employee')->references('id_employee')->on('employee')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_project')->references('id')->on('project')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('works_on');
    }
}
