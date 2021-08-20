<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Artisan::call('db:seed --class=UserSeeder');
        Artisan::call('db:seed --class=FiatTypeSeeder');
        Artisan::call('db:seed --class=CryptoTypeSeeder');

        Artisan::call('db:seed --class=FiatSeeder');
        Artisan::call('db:seed --class=CryptoSeeder');
        Artisan::call('db:seed --class=PostSeeder');
    }
}
