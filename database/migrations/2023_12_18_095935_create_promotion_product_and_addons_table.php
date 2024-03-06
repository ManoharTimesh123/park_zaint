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
        Schema::create('promotion_product_and_addons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('addons_id')->nullable();
            $table->unsignedBigInteger('promotion_id');
            $table->boolean('is_exclude')->default(false);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('addons_id')
            ->references('id')
            ->on('addons')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('product_id')
            ->references('id')
            ->on('products')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('promotion_id')
            ->references('id')
            ->on('promotions')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotion_product_and_addons');
    }
};
