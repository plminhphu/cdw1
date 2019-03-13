<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flightlists', function (Blueprint $table) {
            $table->bigIncrements('id_flightlist');
            $table->unsignedBigInteger('id_airline');
            $table->foreign('id_airline')->references('id')->on('airlines');
            $table->unsignedBigInteger('id_city_from');
            $table->foreign('id_city_from')->references('id')->on('cities');
            $table->unsignedBigInteger('id_city_to');
            $table->foreign('id_city_to')->references('id')->on('cities');
            $table->unsignedBigInteger('id_airport_from');
            $table->foreign('id_airport_from')->references('id')->on('airports');
            $table->unsignedBigInteger('id_airport_to');
            $table->foreign('id_airport_to')->references('id')->on('airports');
            $table->dateTime('time_from');
            $table->dateTime('time_to');
            $table->integer('people');
            $table->integer('max_people');
            $table->integer('transit');
            $table->time('duration');
            $table->float('price', 15, 2);
            $table->timestamps();
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flightlists');
    }
}
