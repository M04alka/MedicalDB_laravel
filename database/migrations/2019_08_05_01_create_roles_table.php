<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('role_name');
            $table->boolean('add_patients')->default(false);
            $table->boolean('update_insurance')->default(false);
            $table->boolean('sell_pills')->default(false);
            $table->boolean('add_to_income')->default(false);
            $table->boolean('add_to_morgue')->default(false);
            $table->boolean('write_med_certificates')->default(false);
            $table->boolean('write_psy_certificates')->default(false);
            $table->boolean('write_recipe')->default(false);
            $table->boolean('is_admin')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
