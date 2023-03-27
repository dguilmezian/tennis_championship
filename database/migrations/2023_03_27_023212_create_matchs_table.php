<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matchs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_player_1');
            $table->unsignedBigInteger('id_player_2');
            $table->integer('player_1_stats')->nullable();
            $table->integer('player_2_stats')->nullable();
            $table->tinyInteger('lucky_player')->nullable();
            $table->integer('luck')->nullable();
            $table->unsignedBigInteger('winner');
            $table->unsignedBigInteger('round_id')->nullable();
            $table->foreign('id_player_1')->references('id')->on('players');
            $table->foreign('id_player_2')->references('id')->on('players');
            $table->foreign('winner')->references('id')->on('players');
            $table->foreign('round_id')->references('id')->on('rounds');
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
        Schema::dropIfExists('matchs');
    }
}
