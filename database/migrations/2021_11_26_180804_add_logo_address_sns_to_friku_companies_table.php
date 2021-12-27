<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLogoAddressSnsToFrikuCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('friku_companies', function (Blueprint $table) {
            // //ロゴ
            //住所
            $table->string('logo')->nullable();
            $table->string('address');
            $table->string('google_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->boolean('is_pickup')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('friku_companies', function (Blueprint $table) {
            $table->dropColumn('logo');
            $table->dropColumn('address');
            $table->dropColumn('google_url');
            $table->dropColumn('instagram_url');
            $table->dropColumn('twitter_url');
            $table->dropColumn('facebook_url');
            $table->dropColumn('is_pickup');
        });
    }
}
