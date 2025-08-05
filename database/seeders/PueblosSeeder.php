<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pueblo;

class PueblosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pueblos = [
            ['name' => 'Sojuela','date' => '2025-08-20', 'latitude' => 42.395, 'longitude' => -2.439],
            ['name' => 'Medrano','date' => '2025-08-20', 'latitude' => 42.423, 'longitude' => -2.480],
            ['name' => 'Albelda de Iregua','date' => '2025-08-20', 'latitude' => 42.407, 'longitude' => -2.470],
            ['name' => 'Cirueña','date' => '2025-08-20', 'latitude' => 42.450, 'longitude' => -2.500],
            ['name' => 'Cenicero','date' => '2025-08-20', 'latitude' => 42.460, 'longitude' => -2.600],
            ['name' => 'Nájera','date' => '2025-08-20', 'latitude' => 42.400, 'longitude' => -2.700],
            ['name' => 'Haro','date' => '2025-08-20', 'latitude' => 42.570, 'longitude' => -2.900],
            ['name' => 'Briones','date' => '2025-08-20', 'latitude' => 42.450, 'longitude' => -2.600],
            ['name' => 'Sorzano','date' => '2025-08-20', 'latitude' => 42.402, 'longitude' => -2.431],
            ['name' => 'Logroño','date' => '2025-08-20', 'latitude' => 42.462, 'longitude' => -2.445],
            ['name' => 'Lardero','date' => '2025-08-20', 'latitude' => 42.441, 'longitude' => -2.467],
            ['name' => 'Villamediana de Iregua','date' => '2025-08-20', 'latitude' => 42.433, 'longitude' => -2.506],
            ['name' => 'Santo Domingo de la Calzada','date' => '2025-08-20', 'latitude' => 42.496, 'longitude' => -2.712],
            ['name' => 'Navarrete','date' => '2025-08-20', 'latitude' => 42.442, 'longitude' => -2.709],
            ['name' => 'Agoncillo','date' => '2025-08-20', 'latitude' => 42.448, 'longitude' => -2.569],
            ['name' => 'Entrena','date' => '2025-08-20', 'latitude' => 42.444, 'longitude' => -2.653],
            ['name' => 'Alfaro','date' => '2025-08-20', 'latitude' => 42.201, 'longitude' => -2.020],
            ['name' => 'Calahorra','date' => '2025-08-20', 'latitude' => 42.298, 'longitude' => -2.445],
        ];

        foreach ($pueblos as $pueblo) {
            Pueblo::create($pueblo);
        }
    }
}
