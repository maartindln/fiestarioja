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
            ['name' => 'Sojuela', 'latitude' => 42.395, 'longitude' => -2.439, 'maps' => 'hola', 'como_llegar' => 'Hey'],
            ['name' => 'saora', 'latitude' => 42.395, 'longitude' => -2.439, 'maps' => 'hola', 'como_llegar' => 'Hey'],
        ];

        foreach ($pueblos as $pueblo) {
            Pueblo::create($pueblo);
        }
    }
}
