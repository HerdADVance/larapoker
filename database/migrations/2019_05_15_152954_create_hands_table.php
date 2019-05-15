<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('player_id')->index();
            $table->integer('card1_id');
            $table->integer('card2_id');
            $table->integer('card3_id');
            $table->integer('card4_id');
            $table->integer('card5_id');
            $table->integer('card6_id');
            $table->integer('card7_id');
            $table->integer('card8_id');
            $table->integer('card9_id');
            $table->integer('card10_id');
            $table->integer('card1_played')->default(0);
            $table->integer('card2_played')->default(0);
            $table->integer('card3_played')->default(0);
            $table->integer('card4_played')->default(0);
            $table->integer('card5_played')->default(0);
            $table->integer('card6_played')->default(0);
            $table->integer('card7_played')->default(0);
            $table->integer('card8_played')->default(0);
            $table->integer('card9_played')->default(0);
            $table->integer('card10_played')->default(0);
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
        Schema::dropIfExists('hands');
    }
}
