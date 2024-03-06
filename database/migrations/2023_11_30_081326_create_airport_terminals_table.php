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
        Schema::create('airport_terminals', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('airport_id');
            $table->foreign('airport_id')->references('id')->on('airports')->onDelete('cascade');
            $table->string('name')->index();
            $table->string('shortname')->index();
            $table->timestamps();
            $table->softDeletes();
            $table->enum('status', ['0', '1'])->default(1)->comment('0 - inactive, 1 - active')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airport_terminals');
    }
};
