<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('ats')->create('auth_user', function (Blueprint $table) {
            $table->id();
            $table->string('password');
            $table->timestamp('last_login')->nullable();
            $table->boolean('is_superuser');
            $table->string('username');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->boolean('is_staff');
            $table->boolean('is_active');
            $table->timestamp('date_joined');
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
        Schema::connection('ats')->dropIfExists('auth_user');
    }
}
