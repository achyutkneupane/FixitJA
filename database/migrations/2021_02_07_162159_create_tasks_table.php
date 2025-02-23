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
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('created_for')->nullable();
            $table->string('name');
            $table->text('description');
            $table->enum('type', array('N/A', 'ready to hire', 'planning', 'budgeting'));
            $table->enum('payment_type', array('project basis','hourly basis'));
            $table->enum('status', array('completed', 'new', 'pending', 'assigned'))->default('new');
            $table->enum('deadline', array('N/A', 'asap', 'within a week', 'within a month', 'more than a month', 'flexible'));
            $table->enum('is_client_on_site', array('1', '0'))->nullable();
            $table->enum('is_repair_parts_provided', array('1', '0'))->nullable();
            $table->boolean('user_equal_working')->nullable()->default(true);
            $table->timestamps();


            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('created_for')->references('id')->on('users');
        });

        Schema::create('subcategory_task', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_category_id');
            $table->unsignedBigInteger('task_id');
            $table->timestamps();

            $table->foreign('sub_category_id')->references('id')->on('sub_categories');
            $table->foreign('task_id')->references('id')->on('tasks');
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
        Schema::create('relatedTasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('related_task_id');
            $table->timestamps();
            
            $table->foreign('task_id')->references('id')->on('tasks');
            $table->foreign('related_task_id')->references('id')->on('tasks');
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