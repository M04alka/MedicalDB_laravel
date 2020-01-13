<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_certificates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('certificate_type_id');
            $table->date('date');
            $table->text('details');
            $table->unsignedInteger('doctor_id');

            $table->foreign('patient_id')
                ->references('id')->on('patients')
                ->onDelete('cascade');

            $table->foreign('certificate_type_id')
                ->references('id')->on('medical_certificate_types')
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
        Schema::dropIfExists('medical_certificates');
    }
}
