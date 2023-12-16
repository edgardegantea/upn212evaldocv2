<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UsuarioModel;

class Usuario extends Seeder
{
    /**
     * @throws \ReflectionException
     */
    public function run()
    {
        $usuarios = new UsuarioModel();

        $usuarios->insertBatch([
            [
                'rol'           => 'admin',
                'codigo'        => '2300A',
                'nombre'        => 'Edgar',
                'apaterno'      => 'Degante',
                'amaterno'      => 'Aguilar',
                'email'         => 'edgar.degante.a@gmail.com',
                'password'      => password_hash('12345678', PASSWORD_DEFAULT),
                'foto'          => null,
                'sexo'          => 'Hombre',
                'created_at'    => '2023-04-06 12:00:00'
            ],
            [
                'rol'           => 'docente',
                'codigo'        => '2300D',
                'nombre'        => 'Ana',
                'apaterno'      => 'López',
                'amaterno'      => 'Barrales',
                'email'         => 'anailb@gmail.com',
                'password'      => password_hash('12345678', PASSWORD_DEFAULT),
                'foto'          => null,
                'sexo'          => 'Mujer',
                'created_at'    => '2023-04-06 12:00:05'
            ],
            [
                'rol'           => 'estudiante',
                'codigo'        => '2300E',
                'nombre'        => 'Mariana',
                'apaterno'      => 'de la Cruz',
                'amaterno'      => 'Pérez',
                'email'         => 'mariana@gmail.com',
                'password'      => password_hash('12345678', PASSWORD_DEFAULT),
                'foto'          => null,
                'sexo'          => 'Mujer',
                'created_at'    => '2023-04-06 12:00:15'
            ]
        ]);
    }
}
