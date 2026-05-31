<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'username' => 'admin',
                'email'    => 'admin@eduva.id',
                'password' => Hash::make('Admin123'),
                'role'     => 'admin',
            ]
        );
    }
}
