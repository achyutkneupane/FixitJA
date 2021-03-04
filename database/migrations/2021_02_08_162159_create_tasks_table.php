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
            $table->enum('payment_type', array('project_basis','hourly_basis'));
            $table->enum('status', array('completed', 'new', 'pending', 'assigned'))->default('new');
            $table->enum('deadline', array('N/A', 'asap', 'within a week', 'within a month', 'more than a month', 'flexible'));
            $table->enum('is_client_on_site', array('1', '0'))->nullable();
            $table->enum('is_repair_parts_provided', array('1', '0'))->nullable();

            $table->string('creator_name');
            $table->string('creator_phone');
            $table->string('creator_email');
            $table->unsignedBigInteger('creator_city_id');
            $table->string('creator_street_01');
            $table->string('creator_street_02')->nullable();
            $table->string('creator_house_number')->nullable();
            $table->string('creator_postal_code')->nullable();
            $table->string('creator_province');
            $table->enum('is_site_location_same',array('1','0'))->default('0');

            $table->unsignedBigInteger('site_city_id')->nullable();
            $table->string('site_street_01')->nullable();
            $table->string('site_street_02')->nullable();
            $table->string('site_house_number')->nullable();
            $table->string('site_postal_code')->nullable();
            $table->string('site_province')->nullable();

            $table->unsignedBigInteger('related_task_id')->nullable();
            $table->timestamps();


            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('created_for')->references('id')->on('users');
            $table->foreign('creator_city_id')->references('id')->on('cities');
            $table->foreign('site_city_id')->references('id')->on('cities');
            $table->foreign('related_task_id')->references('id')->on('tasks');
        });

        Schema::create('subcategory_task', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_category_id');
            $table->unsignedBigInteger('task_id');
            $table->timestamps();

            $table->foreign('sub_category_id')->references('id')->on('sub_categories');
            $table->foreign('task_id')->references('id')->on('tasks');
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