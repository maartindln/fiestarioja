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
            ['name' => 'Sojuela','description' => 'Pueblo pequeño en La Rioja, conocido por sus paisajes montañosos.','latitude' => 42.37,'longitude' => -2.545,'como_llegar' => 'Carretera LR-250 desde Logroño'],
            ['name' => 'Haro','description' => 'Villa famosa por sus bodegas y el vino de Rioja Alta.','latitude' => 42.5769,'longitude' => -2.84611,'como_llegar' => 'Autovía A-12, salida Haro'],
            ['name' => 'Santo Domingo de la Calzada','description' => 'Localidad histórica en el Camino de Santiago.','latitude' => 42.4419,'longitude' => -2.9525,'como_llegar' => 'N-120, dirección Burgos'],
            ['name' => 'Sorzano','description' => 'Municipio cercano a Logroño con bodegas familiares.','latitude' => 42.388,'longitude' => -2.65,'como_llegar' => 'LR-254 desde Logroño'],
            ['name' => 'Sotés','description' => 'Pequeño municipio rural de La Rioja Alta.','latitude' => 42.45,'longitude' => -2.75,'como_llegar' => 'LR-254 desde Haro'],
            ['name' => 'Santurde de Rioja','description' => 'Pueblo con arquitectura tradicional riojana.','latitude' => 42.40,'longitude' => -2.90,'como_llegar' => 'LR-206 desde Santo Domingo de la Calzada'],
            ['name' => 'Santurdejo','description' => 'Localidad tranquila rodeada de viñedos.','latitude' => 42.43,'longitude' => -2.87,'como_llegar' => 'LR-206 desde Haro'],
            ['name' => 'San Vicente de la Sonsierra','description' => 'Pueblo medieval con castillo y viñedos.','latitude' => 42.52,'longitude' => -2.63,'como_llegar' => 'LR-111 desde Haro'],
            ['name' => 'Tormantos','description' => 'Municipio en La Rioja Baja con paisaje agrícola.','latitude' => 42.43,'longitude' => -2.78,'como_llegar' => 'LR-254 desde Haro'],
            ['name' => 'Tricio','description' => 'Localidad con restos romanos y tradición vitivinícola.','latitude' => 42.30,'longitude' => -2.68,'como_llegar' => 'LR-202 desde Logroño'],
            ['name' => 'Uruñuela','description' => 'Pueblo en la ribera del río Najerilla.','latitude' => 42.35,'longitude' => -2.85,'como_llegar' => 'LR-111 desde Nájera'],
            ['name' => 'Valgañón','description' => 'Municipio en zona montañosa de La Rioja.','latitude' => 42.48,'longitude' => -3.04,'como_llegar' => 'LR-232 desde Ezcaray'],
            ['name' => 'Ventrosa','description' => 'Pequeña población rural con entorno natural.','latitude' => 42.40,'longitude' => -2.80,'como_llegar' => 'LR-232 desde Ezcaray'],
            ['name' => 'Viguera','description' => 'Pueblo con historia medieval y viñedos.','latitude' => 42.41,'longitude' => -2.75,'como_llegar' => 'LR-254 desde Logroño'],
            ['name' => 'Villamediana de Iregua','description' => 'Localidad cercana a Logroño con servicios modernos.','latitude' => 42.45,'longitude' => -2.44,'como_llegar' => 'A-12, salida Villamediana'],
            ['name' => 'Villalba de Rioja','description' => 'Municipio en la Rioja Alta con viñedos.','latitude' => 42.52,'longitude' => -2.86,'como_llegar' => 'LR-111 desde Haro'],
            ['name' => 'Villalobar de Rioja','description' => 'Zona vinícola tranquila y con paisaje agrícola.','latitude' => 42.51,'longitude' => -2.84,'como_llegar' => 'LR-111 desde Haro'],
            ['name' => 'Sajazarra','description' => 'Pueblo pequeño con calles empedradas y castillo.','latitude' => 42.40,'longitude' => -2.94,'como_llegar' => 'LR-206 desde Haro'],
            ['name' => 'Cervera del Río Alhama','description' => 'Municipio en La Rioja Baja con historia romana.','latitude' => 42.17,'longitude' => -2.60,'como_llegar' => 'N-232 desde Calahorra'],
            ['name' => 'Calahorra','description' => 'Ciudad importante de La Rioja, con historia y comercio.','latitude' => 42.30,'longitude' => -1.96,'como_llegar' => 'Autovía A-68, salida Calahorra'],
        ];


        foreach ($pueblos as $pueblo) {
            Pueblo::create($pueblo);
        }
    }
}
