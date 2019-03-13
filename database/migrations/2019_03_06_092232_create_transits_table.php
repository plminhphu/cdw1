<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transits', function (Blueprint $table) {
            $table->bigIncrements('id_transit');
            $table->unsignedBigInteger('id_flightlists');
            $table->foreign('id_flightlists')->references('id')->on('flightlists');
            $table->unsignedBigInteger('id_airports_from');
            $table->foreign('id_airports_from')->references('id')->on('airports');
            $table->unsignedBigInteger('id_airports_to');
            $table->foreign('id_airports_to')->references('id')->on('airports');
            $table->dateTime('time_from');
            $table->dateTime('time_to');
            $table->time('time_duration');
            $table->time('time_transit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transits');
    }
}
