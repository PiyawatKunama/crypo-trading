<?php

namespace Database\Factories;

use App\Models\Crypto;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $trade_type = [
            'buy',
            'sell',
        ];
        return [

            'user_id' => User::all()->random()->id,
            'usd_selling_price' => $this->faker->numerify,
            'num_max_coin'=> rand(1,4)            ,
            'trade_type' => $trade_type[array_rand($trade_type)],
            'created_at' => Carbon::now()->subHours(rand(1, 55))
        ];
    }
}
