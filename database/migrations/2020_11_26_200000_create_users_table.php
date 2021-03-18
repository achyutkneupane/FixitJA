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
        //Schema has been created according to ER diagram
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->string('email')->unique();
            $table->string('password');
            // $table->string('phone')->unique();
            $table->enum('gender', array('male','female','other'))->nullable();
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
            $table->string('days')->nullable();
            $table->integer('hours')->nullable();
            $table->unsignedBigInteger('subscription_id')->nullable();
            $table->enum('type', array('admin', 'individual_contractor', 'business', 'general_user'))->nullable();
            $table->enum('status', array('new','pending', 'reviewing', 'active', 'declined', 'suspended', 'blocked', 'deactivated', 'deleted'))->default('new');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('verification_code');

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
