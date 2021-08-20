<?php

namespace Database\Seeders;

use App\Models\Fiat;
use Illuminate\Database\Seeder;

class FiatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($x = 0; $x < 6; $x++) {
            Fiat::factory()->create([
                'user_id' => $x + 1,
            ]);
        }
    }
}
