<?php

namespace Database\Seeders;

use App\Models\Category_classes;
use App\Models\Category_events;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'BEBAS',
            'DADA',
            'KUPU',
            'PUNGGUNG',
            'KAKI BEBAS PAPAN',
            'KAKI DADA PAPAN',
            'KAKI BEBAS PAPAN + FINS',
            'BEBAS + FINS',
            'KUPU + FINS',
            'PUNGGUNG + FINS'
        ];

        $levels = [
            'TK',
            'SD Kelas 1',
            'SD Kelas 2',
            'SD Kelas 3',
            'SD Kelas 4',
            'SD Kelas 5',
            'SD Kelas 6',
            'SMP Kelas 1',
            'SMP Kelas 2',
            'SMP Kelas 3'
        ];

        $categoryIdMap = [
            'BEBAS' => 1,
            'DADA' => 2,
            'KUPU' => 3,
            'PUNGGUNG' => 4,
            'KAKI BEBAS PAPAN' => 5,
            'KAKI DADA PAPAN' => 6,
            'KAKI BEBAS PAPAN + FINS' => 7,
            'BEBAS + FINS' => 8,
            'KUPU + FINS' => 9,
            'PUNGGUNG + FINS' => 10,
        ];

        $classIdMap = [
            'TK' => 1,
            'SD Kelas 1' => 2,
            'SD Kelas 2' => 3,
            'SD Kelas 3' => 4,
            'SD Kelas 4' => 5,
            'SD Kelas 5' => 6,
            'SD Kelas 6' => 7,
            'SMP Kelas 1' => 8,
            'SMP Kelas 2' => 9,
            'SMP Kelas 3' => 10
        ];

        foreach ($levels as $level) {
            foreach ($categories as $category) {
                if (($level === 'TK' || strpos($level, 'SD Kelas') !== false && (int)substr($level, -1) <= 2) &&
                    in_array($category, ['KUPU', 'PUNGGUNG', 'KUPU + FINS', 'PUNGGUNG + FINS'])
                ) {
                    continue;
                }

                Category_events::create([
                    'event_id' => 1,
                    'category_class_id' => $this->getCategoryClassId($category, $level),
                    'price' => 100000,
                ]);
            }
        }
    }

    private function getCategoryClassId($category, $level)
    {
        $categoryId = [
            'BEBAS' => 1,
            'DADA' => 2,
            'KUPU' => 3,
            'PUNGGUNG' => 4,
            'KAKI BEBAS PAPAN' => 5,
            'KAKI DADA PAPAN' => 6,
            'KAKI BEBAS PAPAN + FINS' => 7,
            'BEBAS + FINS' => 8,
            'KUPU + FINS' => 9,
            'PUNGGUNG + FINS' => 10,
        ][$category];

        $classId = [
            'TK' => 1,
            'SD Kelas 1' => 2,
            'SD Kelas 2' => 3,
            'SD Kelas 3' => 4,
            'SD Kelas 4' => 5,
            'SD Kelas 5' => 6,
            'SD Kelas 6' => 7,
            'SMP Kelas 1' => 8,
            'SMP Kelas 2' => 9,
            'SMP Kelas 3' => 10
        ][$level];

        return Category_classes::where('category_id', $categoryId)
            ->where('class_id', $classId)
            ->first()->id;
    }
}
