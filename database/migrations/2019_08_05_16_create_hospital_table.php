<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('patient_id');
            $table->date('date');
            $table->unsignedInteger('hospital_type_id');
            $table->unsignedInteger('doctor_id');

            $table->foreign('patient_id')
                ->references('id')->on('patients')
                ->onDelete('cascade');
            $table->foreign('hospital_type_id')
                ->references('id')->on('hospital_types')
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
        Schema::dropIfExists('hospital');
    }
}
