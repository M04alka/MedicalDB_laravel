<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patient_id');
            $table->date('begin_date');
            $table->date('end_date');
            $table->string('diagnosis');
            $table->unsignedInteger('pill_type_id');
            $table->integer('dose');
            $table->integer('pills_amount');
            $table->unsignedInteger('doctor_id');

            $table->foreign('patient_id')
                ->references('id')->on('patients')
                ->onDelete('cascade');

            $table->foreign('doctor_id')
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
        Schema::dropIfExists('recipe');
    }
}
