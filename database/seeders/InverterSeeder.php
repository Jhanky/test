<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Inverter;

class InverterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Inverter::create([
            'name' => 'Inversor SMA Sunny Tripower 10000TL',
            'model' => 'Sunny Tripower 10000TL',
            'brand' => 'SMA',
            'power_output_kw' => 10,
            'grid_type' => 'trifasico 220v',
            'system_type' => 'on-grid',
            'price' => 4500000,
            'technical_sheet_path' => 'inverters/sma-10000.pdf',
            'is_active' => true,
        ]);

        Inverter::create([
            'name' => 'Inversor Fronius Primo 8.2-1',
            'model' => 'Primo 8.2-1',
            'brand' => 'Fronius',
            'power_output_kw' => 8.2,
            'grid_type' => 'monofasico',
            'system_type' => 'on-grid',
            'price' => 3800000,
            'technical_sheet_path' => 'inverters/fronius-8200.pdf',
            'is_active' => true,
        ]);

        Inverter::create([
            'name' => 'Inversor Huawei SUN2000-10KTL-M1',
            'model' => 'SUN2000-10KTL-M1',
            'brand' => 'Huawei',
            'power_output_kw' => 10,
            'grid_type' => 'trifasico 440v',
            'system_type' => 'hibrido',
            'price' => 4200000,
            'technical_sheet_path' => 'inverters/huawei-10000.pdf',
            'is_active' => true,
        ]);
    }
}
