<?php

namespace App\Controllers\Usuario;

use App\Controllers\BaseController;

class FrontendController extends BaseController
{
    public function index()
    {
        
    }

    public function instrucciones() {
        return view('usuario/frontend/instrucciones');
    }

    public function acercade() {
        return view('usuario/frontend/acercade');
    }

    public function contacto() {
        return view('usuario/frontend/contacto');
    }
}
