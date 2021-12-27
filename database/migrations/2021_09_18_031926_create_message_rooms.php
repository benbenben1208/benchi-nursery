<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageRooms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_rooms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('auth_user_id');
            // ->constrained('auth_user')
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
            //別DBと外部キー制約をつけるやりかたがわからなかったので暫定
            $table->foreignId('corporation_joboffer_id');
            // $table->foreignId('corporation_joboffer_id')->constrained('corporation_joboffer')
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
            $table->tinyInteger('reply_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_rooms');
    }
}
