<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id_booking');
            $table->integer('number_booking');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->dateTime('time_from');
            $table->varchar('flight_type',11);
            $table->dateTime('time_to')->nullable();
            $table->unsignedBigInteger('id_paymethod');
            $table->foreign('id_paymethod')->references('id')->on('paymethods');
            $table->string('name_paymethod')->default('NULL');
            $table->char('ccv_paymethod')->default('NULL');
            $table->string('contact_fname');
            $table->string('contact_lname');
            $table->integer('contact_phone');
            $table->string('contact_email');
            $table->float('total_price', 17, 2);
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
        Schema::dropIfExists('bookings');
    }
}
