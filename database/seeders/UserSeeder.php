<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        User::factory()->create([
            'email' => 'test1@gmail.com',
            // 'password' => bcrypt("11111111")
            'password' => "11111111"

        ]);

        User::factory()->create([
            'email' => 'test2@gmail.com',
            'password' => "22222222"
        ]);

        User::factory(4)->create();
    }
}
