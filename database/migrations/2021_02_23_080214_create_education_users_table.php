<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_users', function (Blueprint $table) {
            $table->id();
              $table->unsignedBigInteger('user_id');
              $table->unsignedBigInteger('education_id');
              $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
              $table->foreign('education_id')->references('id')->on('education')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education_users');
    }
}
