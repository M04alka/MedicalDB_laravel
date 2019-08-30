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
            $table->unsignedInteger('type_id')->default(1);
            $table->unsignedBigInteger('medical_certificate_id')->nullable($value = true);
            $table->unsignedBigInteger('psychological_certificate_id')->nullable($value = true);
            $table->boolean('is_active')->default(false);
            $table->date('active_from');
            $table->date('active_to');

            $table->foreign('type_id')
                ->references('id')->on('types_of_insurance')
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
