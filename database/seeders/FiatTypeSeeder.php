<?php

namespace Database\Seeders;

use App\Models\FiatType;
use Illuminate\Database\Seeder;

class FiatTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $fait_type = array("USD", "EUR", "JPY", "GBP", "CHF", "CAD", "AUD", "ZAR");

        $usd_exchange_rate = array(1, 0.86, 109.71, 0.73, 0.92, 1.29, 0.92, 2.18);

        for ($x = 0; $x < count($fait_type); $x++) {
            FiatType::create([
                'name' => $fait_type[$x],
                'usd_exchange_rate' => $usd_exchange_rate[$x]
            ]);
        }
    }
}
