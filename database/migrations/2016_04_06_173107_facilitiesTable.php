<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('facilities', function (Blueprint $table) {
            $table->string('kode', 255);
            $table->string('sfname', 255);
            $table->string('category',255);
            $table->text('description');
            $table->tinyInteger('status');
            $table->string('updated_at', 255);
            $table->string('created_at', 255);
            $table->primary('kode');
            $table->unique('created_at');
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
        Schema::drop('facilities');
    }
}
