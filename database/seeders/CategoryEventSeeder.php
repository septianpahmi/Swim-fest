<?php

namespace Database\Seeders;

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
        Category_events::create([
            'event_id' => '1',
            'category_class_id' => '1',
            'price' => '300000',
        ]);
        Category_events::create([
            'event_id' => '1',
            'category_class_id' => '3',
            'price' => '300000',
        ]);
        Category_events::create([
            'event_id' => '2',
            'category_class_id' => '2',
            'price' => '400000',
        ]);
        Category_events::create([
            'event_id' => '2',
            'category_class_id' => '3',
            'price' => '1000000',
        ]);
    }
}
