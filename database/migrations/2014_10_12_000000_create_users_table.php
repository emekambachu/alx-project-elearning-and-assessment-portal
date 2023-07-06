<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('ip')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('email')->unique();
            $table->string('verification_token')->nullable();
            $table->string('password')->nullable();
            $table->string('mobile')->nullable();
            $table->string('gender')->nullable();
            $table->string('education')->nullable();
            $table->string('image')->nullable();
            $table->string('image_path')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->tinyInteger('selected')->default(0)->nullable();
            $table->timestamp('last_login')->nullable();
            $table->rememberToken();
            $table->timestamps();
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
}
