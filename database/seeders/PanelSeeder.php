<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Panel;

class PanelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Panel::create([
            'name' => 'Panel Solar Jinko JKM415M-54HL4-B',
            'model' => 'JKM415M-54HL4-B',
            'brand' => 'Jinko Solar',
            'power_output' => 415,
            'price' => 850000,
            'technical_sheet_path' => 'panels/jinko-415.pdf',
            'is_active' => true,
        ]);

        Panel::create([
            'name' => 'Panel Solar Canadian Solar CS3K-395MS',
            'model' => 'CS3K-395MS',
            'brand' => 'Canadian Solar',
            'power_output' => 395,
            'price' => 780000,
            'technical_sheet_path' => 'panels/canadian-395.pdf',
            'is_active' => true,
        ]);

        Panel::create([
            'name' => 'Panel Solar Trina Solar TSM-400DE15M(II)',
            'model' => 'TSM-400DE15M(II)',
            'brand' => 'Trina Solar',
            'power_output' => 400,
            'price' => 820000,
            'technical_sheet_path' => 'panels/trina-400.pdf',
            'is_active' => true,
        ]);
    }
}
