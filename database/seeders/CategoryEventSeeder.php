<?php

namespace Database\Seeders;

use App\Models\Category_events;
use Illuminate\Database\Seeder;
use App\Models\Category_classes;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'KAKI BEBAS PAPAN' => 1,
            'KAKI DADA PAPAN' => 2,
            'KAKI BEBAS PAPAN + FINS' => 3,
            'BEBAS + FINS' => 4,
            'KUPU + FINS' => 5,
            'PUNGGUNG + FINS' => 6,
            'BEBAS' => 7,
            'DADA' => 8,
            'KUPU' => 9,
            'PUNGGUNG' => 10,
            'GAYA GANTI' => 11,
        ];

        $levels = [
            '6 TAHUN KE BAWAH' => 1,
            '7 TAHUN' => 2,
            '8 TAHUN' => 3,
            '9 TAHUN' => 4,
            '10 - 11 TAHUN' => 5,
            '12 - 13 TAHUN' => 6,
            '14 - 15 TAHUN' => 7,
        ];

        $distances = [
            '25 M' => 1,
            '50 M' => 2,
            '100 M' => 3,
        ];

        $excludedCombinations = [
            '6 TAHUN KE BAWAH' => [
                'KUPU + FINS',
                'PUNGGUNG + FINS',
                'KUPU',
                'PUNGGUNG',
                'GAYA GANTI',
            ],
            '7 TAHUN' => [
                'KUPU + FINS',
                'PUNGGUNG + FINS',
                'KUPU',
                'PUNGGUNG',
                'GAYA GANTI',
            ],
            '8 TAHUN' => [
                'KUPU',
                'PUNGGUNG',
                'GAYA GANTI',
            ],
            '9 TAHUN' => [
                'KUPU',
                'PUNGGUNG',
                'GAYA GANTI',
            ],
            '10 - 11 TAHUN' => [
                'KAKI BEBAS PAPAN',
                'KAKI DADA PAPAN',
                'KAKI BEBAS PAPAN + FINS',
                'BEBAS + FINS',
                'KUPU + FINS',
                'PUNGGUNG + FINS',
            ],
            '12 - 13 TAHUN' => [
                'KAKI BEBAS PAPAN',
                'KAKI DADA PAPAN',
                'KAKI BEBAS PAPAN + FINS',
                'BEBAS + FINS',
                'KUPU + FINS',
                'PUNGGUNG + FINS',
            ],
            '14 - 15 TAHUN' => [
                'KAKI BEBAS PAPAN',
                'KAKI DADA PAPAN',
                'KAKI BEBAS PAPAN + FINS',
                'BEBAS + FINS',
                'KUPU + FINS',
                'PUNGGUNG + FINS',
            ],
        ];

        foreach ($levels as $level => $classId) {
            foreach ($categories as $category => $categoryId) {
                if (isset($excludedCombinations[$level]) && in_array($category, $excludedCombinations[$level])) {
                    continue;
                }

                $levelDistances = [];

                if (($level === '6 TAHUN KE BAWAH' || $level === '7 TAHUN') &&
                    in_array($category, ['KAKI BEBAS PAPAN', 'KAKI DADA PAPAN', 'KAKI BEBAS PAPAN + FINS', 'BEBAS + FINS', 'BEBAS', 'DADA'])
                ) {
                    $levelDistances = ['25 M'];
                } elseif (($level === '8 TAHUN' || $level === '9 TAHUN') &&
                    in_array($category, ['KAKI BEBAS PAPAN', 'KAKI DADA PAPAN', 'KAKI BEBAS PAPAN + FINS', 'BEBAS + FINS', 'KUPU + FINS', 'PUNGGUNG + FINS', 'BEBAS', 'DADA'])
                ) {
                    $levelDistances = ['25 M'];
                } elseif (($level === '10 - 11 TAHUN' || $level === '12 - 13 TAHUN' || $level === '14 - 15 TAHUN') &&
                    in_array($category, ['BEBAS', 'DADA', 'KUPU', 'PUNGGUNG'])
                ) {
                    $levelDistances = ['25 M', '50 M'];
                } elseif (($level === '10 - 11 TAHUN' || $level === '12 - 13 TAHUN' || $level === '14 - 15 TAHUN') &&
                    in_array($category, ['GAYA GANTI'])
                ) {
                    $levelDistances = ['100 M'];
                }

                if (!empty($levelDistances)) {
                    foreach ($levelDistances as $distance) {
                        $categoryClass = Category_classes::where('category_id', $categoryId)
                            ->where('class_id', $classId)->where('distance_id', $distances[$distance])
                            ->first();

                        if ($categoryClass) {
                            Category_events::create([
                                'event_id' => 1,
                                'category_class_id' => $categoryClass->id,
                            ]);
                        } else {
                            Log::error("Category class combination not found for category {$category} and level {$level}");
                        }
                    }
                }
            }
        }
    }
}
