<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorporationLatlngTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('ats')->create('corporation_latlng', function (Blueprint $table) {
            $table->id();
            $table->integer('lat_lng_id')->nullable();

            $table->integer('prefecture')->nullable();
            $table->string('city')->nullable();
            $table->string('building')->nullable();
            $table->float('lat');
            $table->float('lng');
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
        Schema::connection('ats')->dropIfExists('corporation_latlng');
    }
}
