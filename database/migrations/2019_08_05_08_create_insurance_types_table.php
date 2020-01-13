<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsuranceTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('insurance_type');
            $table->string('about_insurance');
            $table->integer('insurance_price');
            $table->integer('insurance_percent');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insurances_types');
    }
}
