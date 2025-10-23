<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Battery;

class BatterySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Battery::create([
            'name' => 'Batería Tesla Powerwall 2',
            'model' => 'Powerwall 2',
            'brand' => 'Tesla',
            'ah_capacity' => 13.5,
            'voltage' => 48,
            'type' => 'Litio',
            'price' => 15000000,
            'technical_sheet_path' => 'batteries/tesla-powerwall.pdf',
            'is_active' => true,
        ]);

        Battery::create([
            'name' => 'Batería LG Chem RESU10H',
            'model' => 'RESU10H',
            'brand' => 'LG Chem',
            'ah_capacity' => 9.8,
            'voltage' => 48,
            'type' => 'Litio',
            'price' => 12000000,
            'technical_sheet_path' => 'batteries/lg-resu10h.pdf',
            'is_active' => true,
        ]);

        Battery::create([
            'name' => 'Batería BYD B-Box Pro',
            'model' => 'B-Box Pro',
            'brand' => 'BYD',
            'ah_capacity' => 11.0,
            'voltage' => 48,
            'type' => 'Litio',
            'price' => 11000000,
            'technical_sheet_path' => 'batteries/byd-bbox.pdf',
            'is_active' => true,
        ]);
    }
}
