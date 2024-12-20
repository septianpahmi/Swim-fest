<?php

namespace Database\Seeders;

use App\Models\Classes;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classes::create([
            'class_name' => 'SDN Kelas 1 ',
            'status' => true,
        ]);
        Classes::create([
            'class_name' => 'SMP Kelas 1 ',
            'status' => true,
        ]);
    }
}
