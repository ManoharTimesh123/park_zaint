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
        Schema::create('email_restricteds', function (Blueprint $table) {
            $table->id();
            $table->string('email'); // Define the email column with a unique constraint
            $table->unsignedBigInteger('promotion_id');
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('email_restricteds');
    }
};
