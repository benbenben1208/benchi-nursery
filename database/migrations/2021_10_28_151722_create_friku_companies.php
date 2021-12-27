<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrikuCompanies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friku_companies', function (Blueprint $table) {
            $table->id();
            $table->string('username_kana');
            $table->string('first_name_kana');
            $table->string('last_name_kana');
            $table->string('company_phone');
            $table->string('site_url');
            //ロゴ
            //住所
            //SNS_URL
            $table->boolean('is_registered');
            $table->uuid('temp_id');
            $table->string('password_change_id')->nullable();
            $table->timestamp('pw_id_created_at')->nullable();
            $table->integer('plan');
            $table->timestamp('charged_at')->nullable();
            $table->timestamp('not_charged_at')->nullable();
            $table->foreignId('user_id')->constrained('staffs')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('friku_companies');
    }
}
