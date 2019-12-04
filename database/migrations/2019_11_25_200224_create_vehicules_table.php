<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("matricule")->nullable($value = false);
            $table->string("picture")->nullable($value = false);
            $table->string("name_veh")->nullable($value = false);
            $table->float("prise_init",8,2)->nullable($value = false);
            $table->float("prise_rised_to",8,2);
            $table->string('category')->nullable($value = false);
            $table->string("place")->nullable($value = false);
            
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
        Schema::dropIfExists('vehicules');
    }
}
