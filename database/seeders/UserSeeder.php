<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Admin User
        DB::table('users')->insert([
            'firstname' => $faker->firstName,
            'lastname' => $faker->lastName,
            'pseudo' => $faker->userName,
            'address' => $faker->address,
            'zipcode' => $faker->postcode,
            'city' => $faker->city,
            'phone_number' => $faker->phoneNumber,
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('adminpassword'),
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Regular User
        DB::table('users')->insert([
            'firstname' => $faker->firstName,
            'lastname' => $faker->lastName,
            'pseudo' => $faker->userName,
            'address' => $faker->address,
            'zipcode' => $faker->postcode,
            'city' => $faker->city,
            'phone_number' => $faker->phoneNumber,
            'email' => 'user@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('userpassword'),
            'role' => 'user',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // création de 8users aléatoires
        User::factory(8)->create();
    }
}
