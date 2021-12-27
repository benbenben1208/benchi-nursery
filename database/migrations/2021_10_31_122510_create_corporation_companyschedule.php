<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorporationCompanyschedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('ats')->create('corporation_companyschedule', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('corporation_company');
            $table->timestamp('start_time');
            $table->timestamp('end_time');

            $table->index('company_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('ats')->dropIfExists('corporation_companyschedule');
    }
}
