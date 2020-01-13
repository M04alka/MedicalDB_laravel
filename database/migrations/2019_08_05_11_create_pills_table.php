<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patient_id');
            $table->date('date');
            $table->unsignedInteger('pill_type_id');
            $table->integer('ammount');
            $table->unsignedInteger('doctors_id');

            $table->foreign('patient_id')
                ->references('id')->on('patients')
                ->onDelete('cascade');

            $table->foreign('doctors_id')
                ->references('id')->on('doctors')
                ->onDelete('cascade');

            $table->foreign('pill_type_id')
                ->references('id')->on('pill_types')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pills');
    }
}
