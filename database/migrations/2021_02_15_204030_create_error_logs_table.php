<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateErrorLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('error_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('found_by');
            $table->unsignedBigInteger('solved_by')->nullable();
            $table->string('module');
            $table->string('title');
            $table->text('description');
            $table->string('url');
            $table->string('ip');
            $table->string('user_agent')->nullable();
            $table->dateTime('solved_at')->nullable();
            $table->timestamps();

            $table->foreign('found_by')->references('id')->on('users');
            $table->foreign('solved_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('error_logs');
    }
}