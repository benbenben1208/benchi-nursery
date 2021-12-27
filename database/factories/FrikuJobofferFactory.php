<?php

namespace Database\Factories;

use App\Consts\JobConditionConsts;
use App\Models\CorporationCompany;
use App\Models\FrikuJoboffer;
use Illuminate\Database\Eloquent\Factories\Factory;

class FrikuJobofferFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FrikuJoboffer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => 1,
            'url' => $this->faker->url,
            'job_offer_status' => $this->faker->numberBetween(0, 1),
            "preview_id" => "9b5ab56c-e08f-47b7-8d26-640d0cf09525",
            'company_name' => $this->faker->company,
            'item_name' => $this->faker->jobTitle,
            'work_type' => $this->faker->numberBetween(0, 11),
            'hiring_system' => $this->faker->numberBetween(0, 11),
            'is_pickup' => $this->faker->boolean(40),
            'job_type' => $this->faker->numberBetween(0, 335),
            'job_description' => $this->faker->realText(),
            'work_time' => '',
            "work_flow" => "",
            "trial" => 0,
            "trial_condition" => 0,
            "trial_period" => "",
            "holiday_description" => '休日についての説明休日についての説明休日についての説明休日についての説明休日についての説明休日についての説明休日についての説明休日についての説明休日についての説明休日についての説明休日についての説明休日についての説明休日についての説明休日についての説明休日についての説明休日についての説明',
            "welfare_description" => '福利厚生についての説明・福利厚生についての説明・福利厚生についての説明・福利厚生についての説明・福利厚生についての説明・福利厚生についての説明・福利厚生についての説明・福利厚生についての説明・福利厚生についての説明・福利厚生についての説明・福利厚生についての説明・福利厚生についての説明・福利厚生についての説明・福利厚生についての説明・',
            "period_min" => "",
            "shift_circle" => "",
            "environment_gender_ratio" => null,
            "worker_message" => "",
            "work_location" => "",
            "access" => "西鉄天神駅",
            "zip_code" => "8100001",
            "prefecture" => 40,
            "city" => $this->faker->randomElement(collect(array_values(JobConditionConsts::CITY))->flatten()),
            "building" => "ZERO 5F",
            "salary_pattern" => $this->faker->numberBetween(0, 4),
            "salary_min" => $this->faker->numberBetween(0, 999999),
            "salary_max" => $this->faker->numberBetween(0, 999999),
            "salary_description" => "ここに給与詳細。ここに給与詳細。ここに給与詳細。ここに給与詳細。ここに給与詳細。ここに給与詳細。ここに給与詳細。ここに給与詳細。ここに給与詳細。ここに給与詳細。",
            "travel_cost" => 0,
            "travel_cost_description" => "",
            "shift_income_example" => "",
            "image1_caption" => "業務中の様子",
            "image2_caption" => "みんなでおしごと",
            "image3_caption" => "",
            "image4_caption" => "",
            "applied_flow" => "",
            "phone" => "",
            "recruit_number" => "080-5555-9999",
            "recruit_number_description" => "",
            'is_crawled' => true,
            "image1" => $this->faker->imageUrl(),
            "image2" => $this->faker->imageUrl(),
            "image3" => $this->faker->imageUrl(),
            "image4" => $this->faker->imageUrl(),
            'created_at' => $this->faker->dateTimeBetween('-2weeks', 'now'),
            'updated_at' => now()
        ];
    }
}
