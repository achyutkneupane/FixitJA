<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateParishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parishes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        DB::table('parishes')->insert([
            ['name' => 'Kingston'],
            ['name' => 'St. Andrew'],
            ['name' => 'Portland'],
            ['name' => 'St. Thomas'],
            ['name' => 'St. Catherine'],
            ['name' => 'St. Mary'],
            ['name' => 'St. Ann'],
            ['name' => 'Manchester'],
            ['name' => 'Clarendon'],
            ['name' => 'Hanover'],
            ['name' => 'Westmoreland'],
            ['name' => 'St. James'],
            ['name' => 'Trelawny'],
            ['name' => 'St. Elizabeth'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parishes');
    }
}
