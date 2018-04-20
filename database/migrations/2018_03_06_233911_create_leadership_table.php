<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadershipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leadership', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('start_date');
            $table->date('finish_date');
            $table->string('location');
            $table->string('academy');
            $table->string('institution')->default('Oracle Inc');
            $table->string('category')->default('National');
            $table->string('internal')->default('YES');
            $table->string('cfu_fu')->nullable();
            $table->string('level')->nullable();
            $table->text('outline')->nullable();
            $table->string('telkom_main')->nullable();
            $table->string('job_family')->nullable();
            $table->text('participants')->nullable();
            $table->date('released_date')->nullable();
            $table->date('expired_at')->nullable();
            $table->string('filename')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('leadership');
    }
}
