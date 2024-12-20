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
        Categories::create([
            'category_name' => '50 Meter Gaya Dada Putra',
            'status' => true,
        ]);
        Categories::create([
            'category_name' => '100 Meter Gaya Dada Putra',
            'status' => true,
        ]);
    }
}
