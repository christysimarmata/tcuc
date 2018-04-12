<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumerDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumer_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('job_family');
            $table->string('peserta')->nullable();
            $table->string('participant_status')->nullable();
            $table->string('file_name')->nullable();
            $table->integer('ubpp')->nullable();
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
        Schema::dropIfExists('consumer_detail');
    }
}
