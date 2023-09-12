<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackingDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracking_data', function (Blueprint $table) {
            $table->id();
            $table->timestamp('timestamp');
            $table->string('ipAddress');
            $table->string('location');
            $table->string('os');
            $table->string('device');
            $table->string('referrer')->nullable();
            $table->string('url');
            $table->string('language');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tracking_data');
    }
}
