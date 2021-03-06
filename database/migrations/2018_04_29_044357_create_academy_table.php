<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academy', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('flag');
            $table->string('name');
            $table->string('table');
            $table->string('table_detail');
            $table->string('niklde');
            $table->string('niknonlde');
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
        Schema::dropIfExists('academy');
    }
}
