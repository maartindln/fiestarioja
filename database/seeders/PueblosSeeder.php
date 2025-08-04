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
            ['name' => 'Sojuela', 'latitude' => 42.395, 'longitude' => -2.439],
            ['name' => 'Medrano', 'latitude' => 42.423, 'longitude' => -2.480],
            ['name' => 'Albelda de Iregua', 'latitude' => 42.407, 'longitude' => -2.470],
            ['name' => 'Cirueña', 'latitude' => 42.450, 'longitude' => -2.500],
            ['name' => 'Cenicero', 'latitude' => 42.460, 'longitude' => -2.600],
            ['name' => 'Nájera', 'latitude' => 42.400, 'longitude' => -2.700],
            ['name' => 'Haro', 'latitude' => 42.570, 'longitude' => -2.900],
            ['name' => 'Briones', 'latitude' => 42.450, 'longitude' => -2.600],
            ['name' => 'Sorzano', 'latitude' => 42.402, 'longitude' => -2.431],
            ['name' => 'Logroño', 'latitude' => 42.462, 'longitude' => -2.445],
            ['name' => 'Lardero', 'latitude' => 42.441, 'longitude' => -2.467],
            ['name' => 'Villamediana de Iregua', 'latitude' => 42.433, 'longitude' => -2.506],
            ['name' => 'Santo Domingo de la Calzada', 'latitude' => 42.496, 'longitude' => -2.712],
            ['name' => 'Navarrete', 'latitude' => 42.442, 'longitude' => -2.709],
            ['name' => 'Agoncillo', 'latitude' => 42.448, 'longitude' => -2.569],
            ['name' => 'Entrena', 'latitude' => 42.444, 'longitude' => -2.653],
            ['name' => 'Alfaro', 'latitude' => 42.201, 'longitude' => -2.020],
            ['name' => 'Calahorra', 'latitude' => 42.298, 'longitude' => -2.445],
        ];

        foreach ($pueblos as $pueblo) {
            Pueblo::create($pueblo);
        }
    }
}
