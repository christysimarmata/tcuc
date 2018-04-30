<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobileDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobile_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('job_family')->nullable();
            $table->string('peserta')->nullable();
            $table->string('participant_status')->nullable();
            $table->string('division')->nullable();
            $table->string('file_name')->nullable();
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
        Schema::dropIfExists('mobile_detail');
    }
}
