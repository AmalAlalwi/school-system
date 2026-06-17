<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'Amal Admin',
            'email' => 'amalalalawi@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
        ]);

        // Additional users
        $names = [
            'Mohamed Ahmed', 'Fatima Hassan', 'Ahmed Ali', 'Amina Mohammed',
            'Omar Ibrahim', 'Noor Abdullah', 'Zainab Mahmoud', 'Karim Rashid',
            'Hana Waleed', 'Tariq Salim', 'Layla Nasser', 'Hassan Yousef',
            'Dina Sami', 'Rashid Khalil'
        ];

        foreach ($names as $index => $name) {
            User::create([
                'name' => $name,
                'email' => 'user' . ($index + 2) . '@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]);
        }
    }
}
