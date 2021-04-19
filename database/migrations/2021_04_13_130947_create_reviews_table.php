<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('reviews');
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('review_by');
            $table->unsignedBigInteger('review_for')->nullable();
            $table->unsignedBigInteger('task_id')->nullable();
            $table->enum('type',array('task','user'));
            $table->text('review');
            $table->integer('rating');
            $table->foreign('review_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('review_for')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
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
        Schema::dropIfExists('reviews');
    }
}
