<?php

namespace Database\Factories;

use App\Models\Crypto;
use App\Models\CryptoType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class CryptoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Crypto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'crypto_type_id' => CryptoType::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'available' => $this->faker->numerify,
            'created_at' => Carbon::now(),
        ];
    }
}
