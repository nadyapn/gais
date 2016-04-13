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
<<<<<<< HEAD
            $table->increments('selfservice_id');
            $table->date('date');
=======
            $table->string('selfservice_id', 30);
            $table->timestamp('date');
>>>>>>> f717c27a566d6246a77f0362ac191395495ef0dc
            $table->string('photo');
            $table->string('category',30);
            $table->text('business_purpose');
            $table->integer('cost');
            $table->tinyInteger('payment');
<<<<<<< HEAD
            $table->string('project_id', 30)->nullable();
            $table->foreign('selfservice_id')->references('kodeSS')->on('selfservice')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('project_id')->references('id')->on('project')->onDelete('cascade')->onUpdate('cascade');
=======
            $table->string('project_id', 30);
            $table->primary('selfservice_id');
            $table->foreign('selfservice_id')->references('kodeSS')->on('selfservice')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('project_id')->references('id')->on('project')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::drop('reimbursement');
    }
}
