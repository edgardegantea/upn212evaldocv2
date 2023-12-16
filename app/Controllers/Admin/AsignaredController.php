<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AsignaredController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $this->session = \Config\Services::session();

        $builder = $this->db->table('asignaturas as a');
        $builder->select('u.*, a.name as area');
        $builder->join('areas as a', 'u.area = a.id');
        $usuarios = $builder->get()->getResult();

        $data = [
            'title' => 'Usuarios',
            'usuarios' => $usuarios
        ];

        return view('admin/usuarios/index', $data);

    }
}
