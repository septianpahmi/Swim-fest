<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'KAKI BEBAS PAPAN',
            'KAKI DADA PAPAN',
            'KAKI BEBAS PAPAN + FINS',
            'BEBAS + FINS',
            'KUPU + FINS',
            'PUNGGUNG + FINS',
            'BEBAS',
            'DADA',
            'KUPU',
            'PUNGGUNG',
            'GAYA GANTI',
        ];
        foreach ($categories as $category) {
            Categories::create([
                'category_name' =>  $category,
                'status' => true,
            ]);
        }
    }
}
