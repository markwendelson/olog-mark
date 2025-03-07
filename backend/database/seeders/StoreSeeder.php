<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Store;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Store::create([
            'opening_hours' => json_encode([
                'monday' => ['08:00-12:00', '12:45-16:00'],
                'wednesday' => ['08:00-12:00', '12:45-16:00'],
                'friday' => ['08:00-12:00', '12:45-16:00'],
                'saturday' => ['08:00-16:00'], // Open every other week
            ]),
        ]);
    }
}
