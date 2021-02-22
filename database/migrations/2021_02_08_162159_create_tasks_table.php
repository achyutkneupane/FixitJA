<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id()->startingValue(1000);
            $table->string('name');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('created_for');
            $table->enum('status', array('completed', 'new', 'pending', 'assigned'));
            $table->text('description');
            $table->unsignedBigInteger('sub_category_id');
            $table->enum('type', array('N/A', 'ready to hire', 'planning', 'budgeting'));
            $table->enum('deadline', array('N/A', 'asap', 'within a week', 'within a month', 'more than a month', 'flexible'));
            $table->unsignedBigInteger('working_location');
            $table->enum('is_client_on_site', array('1', '0'));
            $table->enum('is_repair_parts_provided', array('1', '0'));
            $table->unsignedBigInteger('related_task_id')->nullable();
            $table->timestamps();


            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('created_for')->references('id')->on('users');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories');
            $table->foreign('related_task_id')->references('id')->on('tasks');
            $table->foreign('working_location')->references('id')->on('cities');
        });

        Schema::create('task_timeline', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_id');
            $table->enum('status', array('created', 'assigned', 'changed', 'completed', 'declined'));
            $table->unsignedBigInteger('user_to');
            $table->unsignedBigInteger('user_by');
            $table->timestamps();

            $table->foreign('task_id')->references('id')->on('tasks');
            $table->foreign('user_to')->references('id')->on('users');
            $table->foreign('user_by')->references('id')->on('users');
        });

        Schema::create('assignedBy_task', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('assigned_by');
            $table->timestamps();

            $table->foreign('task_id')->references('id')->on('tasks');
            $table->foreign('assigned_by')->references('id')->on('users');
        });

        Schema::create('assignedTo_task', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('assigned_to');
            $table->timestamps();

            $table->foreign('task_id')->references('id')->on('tasks');
            $table->foreign('assigned_to')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}