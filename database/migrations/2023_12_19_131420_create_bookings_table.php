<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('outbound_flight');
            $table->unsignedBigInteger('airport_id');
            $table->foreign('airport_id')->references('id')->on('airports');
            $table->unsignedBigInteger('outbound_terminal_id');
            $table->foreign('outbound_terminal_id')->references('id')->on('airport_terminals');

            $table->string('inbound_flight');
            $table->unsignedBigInteger('inbound_terminal_id');
            $table->foreign('inbound_terminal_id')->references('id')->on('airport_terminals');

            $table->json('vehicle_details');
            $table->string('no_of_passengers');

            $table->date('travel_start_date');
            $table->date('travel_end_date');
            $table->double('total_price');
            $table->timestamps();
            $table->softDeletes();
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
};
