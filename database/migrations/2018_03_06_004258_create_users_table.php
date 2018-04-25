<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('nik')->nullable();
            $table->string('nama')->nullable();
            $table->string('password')->nullable();
            $table->string('role')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('job')->nullable();
            $table->string('division')->nullable();
            $table->string('current_division')->nullable();
            $table->string('avatar')->default('default.jpg');
            $table->string('status')->default('fix');
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
