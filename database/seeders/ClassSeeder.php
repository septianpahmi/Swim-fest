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
            '6 TAHUN KE BAWAH',
            '7 TAHUN',
            '8 TAHUN',
            '9 TAHUN',
            '10 - 11 TAHUN',
            '12 - 13 TAHUN',
            '14 - 15 TAHUN',
        ];
        // $classes = [
        //     'KP A',
        //     'KP B',
        //     'KP C',
        //     'KP D',
        //     'KU IV',
        //     'KU III',
        //     'KU II',
        // ];

        foreach ($classes as $class) {
            Classes::create([
                'class_name' => $class,
                'status' => true,
            ]);
        }
    }
}
