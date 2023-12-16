<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\AreaModel;

class Area extends Seeder
{
    public function run()
    {
        $areas = new AreaModel();

        $areas->insertBatch([
            [
                'nombre' => 'ADMINISTRATIVOS DE BASE'
            ],
            [
                'nombre' => 'ADMINISTRATIVOS GUADALUPE VICTORIA'
            ],
            [
                'nombre' => 'ADMINISTRATIVOS INVITADOS UNIDAD TEZIUTLAN'
            ],
            [
                'nombre' => 'ACADEMICO DE BASE'
            ],
            [
                'nombre' => 'ACADEMICO INVITADO UNIDAD TEZIUTLAN'
            ],
            [
                'nombre' => 'ACADEMICO INVITADO SUBSEDE HUEYAPAN'
            ],
            [
                'nombre' => 'ACADEMICO INVITADO SUBSEDE AYOTOXCO'
            ],
            [
                'nombre' => 'ACADEMICO INVITADO SUBSEDE GUADALUPE VICTORIA'
            ],
            [
                'nombre' => 'ACADEMICO INVITADO SUBSEDE ZAPOTITLAN'
            ],
            [
                'nombre' => 'ACADEMICO INVITADO SUBSEDE HUEHUETLA'
            ]
        ]);
    }
}
