<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_payment_infos', function (Blueprint $table) {
            $table->id();
            $table->string('paymentlinks');
            $table->string('payment_intent_id')->nullable();
            $table->unsignedBigInteger('booking_id')->nullable();
            $table->enum('status', ['pending', 'complete', 'refund', 'expired'])->index();
            $table->float('totalamount')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('booking_id')
            ->references('id')
            ->on('bookings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_payment_info');
    }
};
