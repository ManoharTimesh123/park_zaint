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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique()->nullable()->index();
            $table->string('name')->nullable()->index();
            $table->string('email')->unique()->nullable()->index();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->bigInteger('phone')->nullable()->index();
            $table->string('profile_pic')->nullable();
            $table->string('company_name')->nullable()->index();
            $table->enum('account_type', ['Corporate', 'Individual'])->default('Individual')->index();
            $table->rememberToken();
            $table->enum('status', ['0', '1'])->default(1)->comment('0 - inactive, 1 - active')->index();
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
        Schema::dropIfExists('users');
    }
};
