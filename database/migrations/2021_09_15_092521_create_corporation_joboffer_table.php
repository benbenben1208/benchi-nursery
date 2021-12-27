<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorporationJobofferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('ats')->create('corporation_joboffer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id');
            $table->string('url')->nullable();
            $table->integer('job_offer_status');
            $table->uuid('preview_id');
            $table->string('company_name');
            $table->string('item_name');
            $table->integer('work_type');
            $table->integer('job_type');
            $table->string('work_type_free')->nullable();
            $table->string('job_type_free')->nullable();
            $table->integer('hiring_system');
            $table->string('job_description')->nullable();
            $table->string('work_time')->nullable();
            $table->string('work_flow')->nullable();
            $table->integer('trial');
            $table->integer('trial_condition');
            $table->integer('prefecture');
            $table->integer('environment_gender_ratio')->nullable();
            $table->integer('salary_pattern');
            $table->integer('travel_cost');
            $table->string('trial_period')->nullable();
            $table->string('holiday_description')->nullable();
            $table->string('welfare_description')->nullable();
            $table->string('period_min')->nullable();
            $table->string('shift_circle')->nullable();
            $table->string('worker_message')->nullable();
            $table->string('work_location')->nullable();
            $table->string('access')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('city')->nullable();
            $table->string('building')->nullable();
            $table->float('salary_min')->nullable();
            $table->float('salary_max')->nullable();
            $table->string('salary_description')->nullable();
            $table->string('travel_cost_description')->nullable();
            $table->string('shift_income_example')->nullable();
            $table->string('image1_caption')->nullable();
            $table->string('image2_caption')->nullable();
            $table->string('image3_caption')->nullable();
            $table->string('image4_caption')->nullable();
            $table->string('applied_flow')->nullable();
            $table->string('phone')->nullable();
            $table->string('recruit_number')->nullable();
            $table->string('recruit_number_description')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->integer('provider')->nullable();
            $table->boolean('is_crawled');

            $table->foreignId('corporation_latlng_id')->nullable()->constrained('corporation_latlng')
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
        Schema::connection('ats')->dropIfExists('corporation_joboffer');
    }
}
