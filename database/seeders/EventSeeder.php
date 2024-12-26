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
            'event_name' => 'SwimFest 2025',
            'slug' => 'swimfest-2025',
            'start_date' => '2025/02/22',
            'end_date' => '2025/02/23',
            'venue' => 'Gelanggang Renang UPI Jl. Dr. Setiabudi No.229, Kec. Sukasari, Kota Bandung, Jawa Barat',
            'description' => 'SwimFest 2025 adalah turnamen renang nasional yang mempertemukan perenang terbaik dari berbagai kategori usia, mulai dari anak-anak hingga dewasa. Event ini dirancang untuk mengasah kemampuan atlet, membangun semangat kompetisi yang sportif, dan menjalin solidaritas di antara komunitas renang di seluruh Indonesia.
            SwimFest adalah panggung bagi mereka yang ingin mencetak prestasi dan mencatatkan nama mereka di kancah renang nasional.',
        ]);
    }
}
