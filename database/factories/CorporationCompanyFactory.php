<?php

namespace Database\Factories;

use App\Models\AuthUser;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CorporationCompany;
class CorporationCompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CorporationCompany::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => AuthUser::factory(),
            'username_kana' => "ユーザーネームのカナ",
            'first_name_kana' => "ナマエ",
            'last_name_kana' => "ミョウジ",
            'company_phone' => $this->faker->phoneNumber,
            'site_url' => $this->faker->url,
            'is_registered' => $this->faker->boolean(50),
            'temp_id' => $this->faker->uuid,
            'password_change_id' => NULL,
            'pw_id_created_at' => NULL,
            'plan' => $this->faker->numberBetween(1, 3),
            'charged_at' => $this->faker->dateTimeBetween('-3 months', '-1 days'),
            'not_charged_at' => NULL,


            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
    }
}
