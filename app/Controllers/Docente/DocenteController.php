<?php

namespace App\Controllers\Docente;

use App\Controllers\BaseController;

class DocenteController extends BaseController
{

    public function __construct()
    {
        if (session()->get('rol') != "docente") {
            echo 'No autorizado';
            exit;
        }
    }

    public function index()
    {
        return view('docente/dashboard');
    }
}
