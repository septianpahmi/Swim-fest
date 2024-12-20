<?php

namespace Database\Seeders;

use App\Models\Category_classes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category_classes::create([
            'category_id' => '1',
            'class_id' => '1',
        ]);
        Category_classes::create([
            'category_id' => '2',
            'class_id' => '2',
        ]);
    }
}
