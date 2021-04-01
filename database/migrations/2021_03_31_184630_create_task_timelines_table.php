<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskTimelinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_timelines', function (Blueprint $table) {
            Schema::dropIfExists('task_timeline');
            $table->id();
            $table->unsignedBigInteger('task_id');
            $table->enum('status', array('created', 'assigned', 'changed', 'completed', 'declined'));
            $table->text('description');
            $table->unsignedBigInteger('user_to')->nullable();
            $table->unsignedBigInteger('user_by')->nullable();
            $table->timestamps();

            $table->foreign('task_id')->references('id')->on('tasks');
            $table->foreign('user_to')->references('id')->on('users');
            $table->foreign('user_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_timelines');
    }
}
