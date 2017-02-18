<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tournament_id');
            $table->unsignedInteger('team_home');
            $table->unsignedInteger('team_away');
            $table->unsignedInteger('score_home');
            $table->unsignedInteger('score_away');
            $table->dateTime('date_planned');
            $table->dateTime('date_started');
            $table->enum('status', ['planned', 'discarded', 'live', 'past'])->default('planned');
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
        Schema::dropIfExists('games');
    }
}
