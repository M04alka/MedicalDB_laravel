<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('insurance_type_id')->default(1);
            $table->unsignedInteger('patient_id');
            $table->unsignedBigInteger('medical_certificate_id')->nullable($value = true);
            $table->unsignedBigInteger('psychological_certificate_id')->nullable($value = true);
            $table->boolean('is_active')->default(false);
            $table->date('active_from');
            $table->date('active_to');

            $table->foreign('insurance_type_id')
                ->references('id')->on('insurance_types')
                ->onDelete('cascade');
            $table->foreign('patient_id')
                ->references('id')->on('patients')
                ->onDelete('cascade');
            $table->foreign('medical_certificate_id')
                ->references('id')->on('medical_certificates')
                ->onDelete('cascade');
            $table->foreign('psychological_certificate_id')
                ->references('id')->on('psychological_certificates')
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
        Schema::dropIfExists('insurances');
    }
}
