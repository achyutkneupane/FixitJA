<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskWorkingLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_working_locations', function (Blueprint $table) {
            $table->id();
            $table->string('parish');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('task_id');
            $table->string('street_01');
            $table->string('street_02')->nullable();
            $table->string('house_number')->nullable();
            $table->string('postal_code')->nullable();
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('task_id')->references('id')->on('tasks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_working_locations');
    }
}
