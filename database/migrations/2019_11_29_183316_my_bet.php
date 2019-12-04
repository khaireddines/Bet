<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MyBet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('MyBets', function (Blueprint $table) {
            $table->bigInteger('user_id');
            $table->bigInteger('object_id');
            $table->primary(['user_id','object_id']);
            $table->float("bet_prise",8,2);
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
        Schema::dropIfExists('MyBets');
    }
}
