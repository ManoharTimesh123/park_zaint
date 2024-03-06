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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('description')->nullable();
            $table->enum('discount_type', ['Fixed Price', 'Fixed Percentage'])->default('Fixed Price')->index();
            $table->float('amount')->nullable();
            $table->timestamp('expire')->nullable();
            $table->integer('minimum_spend')->nullable();
            $table->integer('maximum_spend')->nullable();
            $table->integer('use_limit')->nullable();
            $table->integer('user_limit')->nullable();
            $table->string('strip_coupon_id', 254)->nullable();
            $table->string('stripe_promotion_id')->nullable();

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
        Schema::dropIfExists('promotions');
    }
};
