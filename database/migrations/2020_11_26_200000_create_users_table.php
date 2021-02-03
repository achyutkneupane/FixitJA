<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->unique();
            $table->string('gender')->nullable();
            $table->string('companyname')->nullable();
            $table->timestamp('email_verified_at')->nullable(); 
            $table->tinyInteger('experience')->nullable();
            $table->string('website')->nullable();
            $table->string('street_01')->nullable();
            $table->string('street_02')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->text('introduction')->nullable();
            $table->string('areas_covering')->nullable();
            $table->boolean('is_police_record')->default('0');
            $table->boolean('is_travelling')->default('0');
            $table->integer('days')->nullable();
            $table->integer('hours')->nullable();
            $table->unsignedBigInteger('subscription_id')->nullable();
            $table->enum('type', array('admin', 'individual_contractor', 'business', 'general_user'));
            $table->enum('status', array('pending', 'active', 'suspended', 'blocked'))->nullable();
            $table->string('verification_code')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
