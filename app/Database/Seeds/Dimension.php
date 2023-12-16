<?php

namespace App\Database\Seeds;

use App\Models\DimensionModel;
use CodeIgniter\Database\Seeder;

class Dimension extends Seeder
{
    public function run()
    {
        $dimensiones = new DimensionModel();

        $dimensiones->insertBatch([
            ['nombre' => 'Dominio de la temática'],
            ['nombre' => 'Actitud de Atención hacia el estudiante'],
            ['nombre' => 'Promoción de la participación y el aprendizaje'],
            ['nombre' => 'Formación integral'],
            ['nombre' => 'Planeación y organización'],
            ['nombre' => 'Evaluación del aprendizaje'],
            ['nombre' => 'Acreditación del aprendizaje'],
            ['nombre' => 'Asistencia y puntualidad'],
            ['nombre' => 'Comentarios']

        ]);
    }
}
