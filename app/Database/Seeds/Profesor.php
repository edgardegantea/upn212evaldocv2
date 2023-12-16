<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\ProfesorModel;

class Profesor extends Seeder
{
    public function run()
    {
        $profesores = new ProfesorModel();

        $profesores->insertBatch([
            ['nombre' => 'AGUSTIN LIMON PEREZ', 'area' => 4],
            ['nombre' => 'BLANCA NORMA IBARRA TEPEPA', 'area' => 4],
            ['nombre' => 'CORNELIO BONILLA ROMERO', 'area' => 4],
            ['nombre' => 'EDITH LYIONS LOPEZ', 'area' => 4],
            ['nombre' => 'ELIZABETH SALAZAR GOMEZ', 'area' => 4],
            ['nombre' => 'EMANUEL CABILDO GONZALEZ', 'area' => 4],
            ['nombre' => 'ERNESTO CONSTANTINO MARIN ALARCON', 'area' => 4],
            ['nombre' => 'GONZALO MARQUEZ GONZALEZ', 'area' => 4],
            ['nombre' => 'HECTOR SANCHEZ MENDEZ', 'area' => 4],
            ['nombre' => 'HECTOR SANCHEZ GUZMAN', 'area' => 4],
            ['nombre' => 'ISRAEL AGUILAR LANDERO', 'area' => 4],
            ['nombre' => 'IVONNE GALINDO GARCIA', 'area' => 4],
            ['nombre' => 'JESUS GILBERTO DIAZ MELGAREJO', 'area' => 4],
            ['nombre' => 'JOSE FERMIN OSORIO SANTOS', 'area' => 4],
            ['nombre' => 'JUAN IGNACIO HERNANDEZ VAZQUEZ', 'area' => 4],
            ['nombre' => 'JUAN RODRIGUEZ GARCIA', 'area' => 4],
            ['nombre' => 'JUDITH SALAZAR GOMEZ', 'area' => 4],
            ['nombre' => 'LETICIA VEGA RAMOS', 'area' => 4],
            ['nombre' => 'MANUELA PALAFOX CARDOSO', 'area' => 4],
            ['nombre' => 'MARIA DANAE HERNANDEZ LOPEZ', 'area' => 4],
            ['nombre' => 'MARIA TEODORA ALONSO MANZANO', 'area' => 4],
            ['nombre' => 'MARYBEL PERALTA LOMBARD', 'area' => 4],
            ['nombre' => 'NELLY REYES  FELIX', 'area' => 4],
            ['nombre' => 'OCTAVIO AGUILAR MEZTIZA', 'area' => 4],
            ['nombre' => 'OLIVER MORA JUAREZ', 'area' => 4],
            ['nombre' => 'ROBERTO RIVERA MARTINEZ', 'area' => 4],
            ['nombre' => 'TAMARA GALINDO GARCIA', 'area' => 4],
            ['nombre' => 'VICTOR MANUEL CASTILLO VERA', 'area' => 4]
        ]);
    }
}
