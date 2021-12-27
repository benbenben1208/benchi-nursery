<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrikuApplicantschedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friku_applicantschedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('friku_joboffer_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('friku_applicant_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamp('preferred_first')->nullable();
            $table->timestamp('preferred_second')->nullable();
            $table->timestamp('preferred_third')->nullable();
            $table->uuid('temp_id');
            $table->integer('status');
            $table->string('media')->nullable();
            $table->string('route')->nullable();
            $table->timestamp('interview_date')->nullable();
            $table->text('applicant_memo')->nullable();
            $table->timestamp('applied_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friku_applicantschedules');
    }
}
