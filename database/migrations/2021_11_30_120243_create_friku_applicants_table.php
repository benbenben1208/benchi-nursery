<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrikuApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friku_applicants', function (Blueprint $table) {
            $table->id();
            $table->uuid('temp_id');
            $table->boolean('is_registered');
            $table->string('password_change_id')->nullable();
            $table->timestamp('pw_id_created_at')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('first_name_kana');
            $table->string('last_name_kana');
            $table->date('birth');
            $table->string('phone');
            $table->string('email')->unique();
            $table->integer('applicant_gender');
            $table->text('memo')->nullable();
            $table->timestamp('applied_at');
            $table->foreignId('user_id')->constrained()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friku_applicants');
    }
}
