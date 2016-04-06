<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReimbursementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('reimbursement', function (Blueprint $table) {
            $table->string('selfservice_id', 30);
            $table->timestamp('date');
            $table->string('photo');
            $table->string('category',30);
            $table->text('business_purpose');
            $table->integer('cost');
            $table->tinyInteger('payment');
            $table->string('project_id', 30);
            $table->primary('selfservice_id');
            $table->foreign('selfservice_id')->references('kodeSS')->on('selfservice')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('project_id')->references('id')->on('project')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::drop('reimbursement');
    }
}