<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Post::factory()->create([
            'user_id' => 1,
            'crypto_id' => 5,
            'usd_selling_price' => 0.328059,
            'num_max_coin' => 70000.000
        ]);

        Post::factory()->create([
            'user_id' => 2,
            'crypto_id' => 2,
            'usd_selling_price' => 1.260000,
            'num_max_coin' => 20.000

        ]);

        Post::factory()->create([
            'user_id' => 2,
            'crypto_id' => 3,
            'usd_selling_price' => 3129.450000,
            'num_max_coin' => 5.000

        ]);

        Post::factory()->create([
            'user_id' => 3,
            'crypto_id' => 1,
            'usd_selling_price' => 48666.900000,
            'num_max_coin' => 2.000
        ]);

        Post::factory()->create([
            'user_id' => 2,
            'crypto_id' => 4,
            'usd_selling_price' => 1.260000,
            'num_max_coin' => 300.000
        ]);
        Post::factory()->create([
            'user_id' => 3,
            'crypto_id' => 1,
            'usd_selling_price' => 48666.900000,
            'num_max_coin' => 4.000
        ]);
    }
}
