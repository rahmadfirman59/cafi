<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class NewUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0;$i < 200; $i++)
        {
            $user = User::create([
                "email"=>$faker->email,
                "name" => $faker->name,
                "password" => Hash::make("admin123"),
            ]);
        }
        //
    }
}
