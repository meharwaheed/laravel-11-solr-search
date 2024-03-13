<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
//    public function run(): void
//    {
//        // User::factory(10)->create();
////        for ($i=0; $i < 5000; $i++) {
////            User::factory(200)->create();
////        }
//
//    }

    public function run(){
        $faker = Factory::create();
        $counter = 0;
        for($j = 1; $j < 10000; $j++){
            for($i = 0; $i < 10000; $i++){
                $user_data[] = [
                    'name' => $faker->userName,
                    'email' => $counter.$faker->email,
                    'password' => "1234",
                ];
                $counter++;
            }

            User::insert($user_data);
            $user_data = [];
        }
    }
}
