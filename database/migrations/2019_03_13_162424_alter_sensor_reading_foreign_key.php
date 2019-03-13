<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSensorReadingForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sensor_reading', function (Blueprint $table) {
            $table->dropForeign('sensor_reading_sensor_id_foreign');

            $table->foreign('sensor_id')->references('id')->on('sensors');
        }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sensor_reading', function (Blueprint $table) {
            $table->dropForeign('sensor_reading_sensor_id_foreign');

            $table->foreign('sensor_id')->references('id')->on('arduino');
        }
        );
    }
}
