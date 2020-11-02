<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->create([
            'name' => Str::random(8),
            'email' => 'monemail@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('pass'),
            'remember_token' => Str::random(10),
        ]);
        User::factory(10)->create();
    }
}
