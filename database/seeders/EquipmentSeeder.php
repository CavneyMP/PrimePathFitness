<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $equipmentData = [
            ['name' => 'Dumbbells', 'description' => 'A short bar with a weight at each end, used typically in pairs for exercise or muscle-building.'],
            ['name' => 'Barbells', 'description' => 'A long bar with weights attached at each end, used for weightlifting.'],
            ['name' => 'Bench', 'description' => 'Used for bench pressing and other exercises.'],
            ['name' => 'Pull-Up Bar', 'description' => 'Horizontal bar fixed above head height, used for pull-ups.'],
            ['name' => 'Cable Machine', 'description' => 'A machine used in weight training that uses a cable to lift weights.'],
        ];
    }
}
