<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Swim Fest',
            'email' => 'admin@swimfest.com',
            'password' => bcrypt('Swimfest2025'),
            'role_id' => 1,
        ]);
    }
}
