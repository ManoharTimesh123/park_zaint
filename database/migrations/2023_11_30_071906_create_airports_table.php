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
        Schema::create('airports', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 255)->index();
            $table->string('slug', 255)->index();
            $table->string('cc_email', 255)->index();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('airports');
    }
};
