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
            $table->string('selfservice_id',255);
            $table->date('date');
            $table->string('photo');
            $table->string('category',255);
            $table->text('business_purpose');
            $table->integer('cost');
            $table->tinyInteger('payment');
            $table->string('project_id', 255)->nullable();
            $table->string('updated_at', 255);
            $table->string('created_at', 255);
            $table->primary('selfservice_id');
            $table->foreign('selfservice_id')->references('kodeSS')->on('selfservice')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('project_id')->references('id')->on('project')->onDelete('cascade')->onUpdate('cascade');
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
