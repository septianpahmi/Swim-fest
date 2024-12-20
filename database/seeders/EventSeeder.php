<?php

namespace Database\Seeders;

use App\Models\Events;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Events::create([
            'event_name' => 'Aqua Blaze National Swiming 2024',
            'slug' => 'aqua-blaze-national-swiming-2024',
            'start_date' => '2024/12/20',
            'end_date' => '2025/12/25',
            'venue' => 'Stadion Aquatik Gelora Bung Karno Jl. Pintu Satu Senayan, Jakarta Pusat, DKI Jakarta',
            'description' => 'Aqua Blaze National Swimming 2024 adalah turnamen renang nasional yang mempertemukan perenang terbaik dari berbagai kategori usia, mulai dari anak-anak hingga dewasa. Event ini dirancang untuk mengasah kemampuan atlet, membangun semangat kompetisi yang sportif, dan menjalin solidaritas di antara komunitas renang di seluruh Indonesia.
            Aqua Blaze adalah panggung bagi mereka yang ingin mencetak prestasi dan mencatatkan nama mereka di kancah renang nasional.',
        ]);

        Events::create([
            'event_name' => 'Festival Akuatik Indonesia 2024',
            'slug' => 'festival-akuatik-undonesia-2024',
            'start_date' => '2024/12/30',
            'end_date' => '2025/01/15',
            'venue' => 'Stadion Aquatik Gelora Bung Karno Jl. Pintu Satu Senayan, Jakarta Pusat, DKI Jakarta',
            'description' => 'Aqua Blaze National Swimming 2024 adalah turnamen renang nasional yang mempertemukan perenang terbaik dari berbagai kategori usia, mulai dari anak-anak hingga dewasa. Event ini dirancang untuk mengasah kemampuan atlet, membangun semangat kompetisi yang sportif, dan menjalin solidaritas di antara komunitas renang di seluruh Indonesia.
            Aqua Blaze adalah panggung bagi mereka yang ingin mencetak prestasi dan mencatatkan nama mereka di kancah renang nasional.',
        ]);
    }
}
