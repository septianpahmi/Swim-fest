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
        $classes = [
            'TK',
            'SD Kelas 1',
            'SD Kelas 2',
            'SD Kelas 3',
            'SD Kelas 4',
            'SD Kelas 5',
            'SD Kelas 6',
            'SMP Kelas 1',
            'SMP Kelas 2',
            'SMP Kelas 3',
        ];

        foreach ($classes as $class) {
            Classes::create([
                'class_name' => $class,
                'status' => true,
            ]);
        }
    }
}
