<?php

namespace Database\Seeders;

use App\Models\CryptoType;
use Illuminate\Database\Seeder;

class CryptoTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $crypto_type = array("BTC", "ETH", "XRP", "DOGE", "USDT");

        $usd_exchange_rate = array(0.000021, 0.00031, 0.82, 3.17, 1.000484);

        for ($x = 0; $x < count($crypto_type); $x++) {
            CryptoType::create([
                'name' => $crypto_type[$x],
                'usd_exchange_rate' => $usd_exchange_rate[$x]
            ]);
        }
    }
}
