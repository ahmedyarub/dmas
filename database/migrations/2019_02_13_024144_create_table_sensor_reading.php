<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSensorReading extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensor_reading', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('temperature');
            $table->integer('water_level');
            $table->integer('humidity');
            $table->unsignedInteger('sensor_id');
            $table->timestamps();

            $table->foreign('sensor_id')->references('id')->on('arduino');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensor_reading');
    }
}
