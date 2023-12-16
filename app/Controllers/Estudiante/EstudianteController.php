<?php

namespace App\Controllers\Estudiante;

use App\Controllers\BaseController;

class EstudianteController extends BaseController
{
    public function __construct()
    {
        if (session()->get('rol') != "estudiante") {
            echo 'Acceso no autorizado';
            exit;
        }
    }

    public function index()
    {
        return view('estudiante/dashboard');
    }
}
