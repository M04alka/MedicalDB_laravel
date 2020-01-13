<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMorguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('morgues', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patient_id')->nullable(true);
            $table->date('date');
            $table->string('time_of_deth')->nullable(true);
            $table->text('autopsy_result');
            $table->text('additional_information')->nullable(true);
            $table->unsignedInteger('doctor_id');

            $table->foreign('patient_id')
                ->references('id')->on('patients')
                ->onDelete('cascade');

            $table->foreign('doctor_id')
                ->references('id')->on('doctors')
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
        Schema::dropIfExists('morgues');
    }
}
