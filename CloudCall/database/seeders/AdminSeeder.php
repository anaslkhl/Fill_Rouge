<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        User::firstOrCreate(
            ['email' => 'admin1@admin.com'],

            [
                'name' => 'administrator',
                'phone' => '069013997',
                'status' => 'online',
                'role' => 'admin',
                'password' => Hash::make('admin123!')
            ]
        );
    }
}
