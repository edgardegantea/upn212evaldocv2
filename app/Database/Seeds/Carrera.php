<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\CarreraModel;

class Carrera extends Seeder
{
    public function run()
    {
        $carreras = new CarreraModel();

        $carreras->insertBatch([
            [
                'abreviatura'   => 'LAE',
                'nombre'        => 'LICENCIATURA EN ADMINISTRACIÓN EDUCATIVA'
            ],
            [
                'abreviatura'   => 'PSIC',
                'nombre'        => 'LICENCIATURA EN PSICOLOGÍA EDUCATIVA'
            ],
[
                'abreviatura'   => 'LIE',
                'nombre'        => 'LICENCIATURA EN INTERVENCIÓN EDUCATIVA'
            ],
            [
                'abreviatura'   => 'PED',
                'nombre'        => 'LICENCIATURA EN PEDAGOGÍA'
            ],
            [
                'abreviatura'   => 'LEIP',
                'nombre'        => 'LICENCIATURA EN EDUCACIÓN E INNOVACIÓN PEDAGÓGICA'
            ],
            [
                'abreviatura'   => 'LEPPMI',
                'nombre'        => 'LICENCIATURA EN PREESCOLAR Y PRIMARIA PARA EL MEDIO INDÍGENA'
            ],
        ]);
    }
}
