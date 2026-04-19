<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
{
    \App\Models\User::updateOrCreate(
        ['email' => 'admin@test.com'], // Cari berdasarkan email ini
        [
            'name' => 'Admin Lab',
            'password' => \Illuminate\Support\Facades\Hash::make('password123'),
        ]
    );
}
}