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
     */
    public function run(): void
    {
        User::factory([
            'name' => "ADMIN",
            'email' => "alex.tournant.2004@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make('Lelex2022'),
            'remember_token' => Str::random(10),
            'admin' => true,
        ])->create();
        \App\Models\User::factory(10)->create();

    }
}
