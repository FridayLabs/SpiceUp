<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScreensTable extends Migration
{
    public function up()
    {
        Schema::create('screens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('public_id')->unique();
            $table->unsignedInteger('game_id')->nullable();
            $table->string('title');
            $table->unsignedInteger('active_state')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('screens');
    }
}
