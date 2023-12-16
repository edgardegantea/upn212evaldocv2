<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class UserController extends BaseController
{
    public function login()
    {
        $data = [];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => "Correo electrónico o contraseña incorrecta",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                return view('login', [
                    "validation" => $this->validator,
                ]);

            } else {
                $model = new UsuarioModel();

                $user = $model->where('email', $this->request->getVar('email'))->first();

                $this->setUserSession($user);

                if($user['rol'] == "admin") {
                    return redirect()->to(base_url('admin'));
                }

                if($user['rol'] == "docente") {
                    return redirect()->to(base_url('docente'));
                }

                if($user['rol'] == "estudiante") {
                    return redirect()->to(base_url('estudiante'));
                }
            }
        }
        return view('login');
    }


    private function setUserSession($user)
    {
        $data = [
            'id'            => $user['id'],
            'codigo'        => $user['codigo'],
            'nombre'        => $user['nombre'],
            'apaterno'      => $user['apaterno'],
            'amaterno'      => $user['amaterno'],
            'email'         => $user['email'],
            'isLoggedIn'    => true,
            'rol'           => $user['rol'],
            'foto'          => $user['foto'],
            'sexo'          => $user['sexo']
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }


    public function login2() {
        return view('login2');
    }
}
