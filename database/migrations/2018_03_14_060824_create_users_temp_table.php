<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTempTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_temp', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik');
            $table->string('nama')->nullable();
            $table->string('password')->nullable();
            $table->string('role')->nullable()->default('user');
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable;
            $table->string('job')->nullable();
            $table->string('ubpp')->nullable();
            $table->string('division')->nullable();
            $table->string('avatar')->default('default.jpg');
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
        Schema::dropIfExists('users_temp');
    }
}
