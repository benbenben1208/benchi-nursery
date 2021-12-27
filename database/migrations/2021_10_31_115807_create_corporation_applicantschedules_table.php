<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorporationApplicantschedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('ats')->create('corporation_applicantschedule', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_offer_id')->constrained('corporation_joboffer')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('applicant_id')->constrained('corporation_applicant')
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


            $table->index('job_offer_id');
            $table->index('applicant_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('ats')->dropIfExists('corporation_applicantschedule');
    }
}
