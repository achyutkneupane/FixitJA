<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('parish_id')->nullable();
            $table->timestamps();
            $table->foreign('parish_id')->references('id')->on('parishes');
        });

        // DB::table('cities')->insert([
        //     ['name' => 'Kingston'],
        //     ['name' => 'Portmore'],
        //     ['name' => 'May Pen'],
        //     ['name' => 'Spanish Town'],
        //     ['name' => 'Montego Bay'],
        //     ['name' => 'Half Way Tree'],
        //     ['name' => 'Mandeville'],
        //     ['name' => 'Savanna-la-Mar'],
        //     ['name' => 'Old Harbour'],
        //     ['name' => 'Port Antonio'],
        //     ['name' => 'Saint Ann\u2019s Bay'],
        //     ['name' => 'Port Maria'],
        //     ['name' => 'Falmouth'],
        //     ['name' => 'Lucea'],
        //     ['name' => 'Black River'],
        //     ['name' => 'Morant Bay'],
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}