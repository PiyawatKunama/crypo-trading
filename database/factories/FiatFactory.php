<?php

namespace Database\Factories;

use App\Models\Fiat;
use App\Models\FiatType;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FiatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fiat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'usd_available' => $this->faker->numerify,
            'created_at' => Carbon::now(),
        ];
    }
}
