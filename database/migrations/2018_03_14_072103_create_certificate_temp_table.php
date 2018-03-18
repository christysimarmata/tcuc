<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificateTempTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificate_temp', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('start_date');
            $table->date('finish_date');
            $table->string('location');
            $table->string('academy');
            $table->text('outline')->nullable();
            $table->string('telkom_main')->nullable();
            $table->string('job_family')->nullable();
            $table->text('participants')->nullable();
            $table->date('released_date')->nullable();
            $table->date('expired_at')->nullable();
            $table->string('status')->default('draftSSO');
            $table->text('commend')->nullable();
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
        Schema::dropIfExists('certificate_temp');
    }
}
