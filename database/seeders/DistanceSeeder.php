<?php

namespace Database\Seeders;

use App\Models\Distance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $distances = [
            '25 M',
            '50 M',
            '100 M',
        ];
        $prices = [
            '100000',
            '150000',
            '200000',
        ];


        foreach ($distances as $index => $distance) {
            Distance::create([
                'jarak' => $distance,
                'price' => $prices[$index],
            ]);
        }
    }
}
