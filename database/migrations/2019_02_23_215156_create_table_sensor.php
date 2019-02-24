<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSensor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial');
            $table->unsignedInteger('dam_id');
            $table->timestamps();

            $table->foreign('dam_id')->references('id')->on('dams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensors');
    }
}
