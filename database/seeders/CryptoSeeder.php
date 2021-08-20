<?php

namespace Database\Seeders;

use App\Models\Crypto;
use Illuminate\Database\Seeder;

class CryptoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Crypto::factory()->create(
            [
                'crypto_type_id' => 1,
                'user_id' => 1,
                'available' => 100,
            ]
        );
        Crypto::factory()->create(
            [
                'crypto_type_id' => 3,
                'user_id' => 2,
                'available' => 300.000,
            ]
        );
        Crypto::factory()->create(
            [
                'crypto_type_id' => 2,
                'user_id' => 2,
                'available' => 1250.000,
            ]
        );
        Crypto::factory()->create(
            [
                'crypto_type_id' => 3,
                'user_id' => 4,
                'available' => 100,
            ]
        );
        Crypto::factory()->create(
            [
                'crypto_type_id' => 4,
                'user_id' => 1,
                'available' => 100,
            ]
        );
    }
}
