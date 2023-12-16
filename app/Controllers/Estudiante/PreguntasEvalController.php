<?php

namespace App\Controllers\Estudiante;

use App\Controllers\BaseController;
use App\Models\PreguntasEvalModel;

class PreguntasEvalController extends BaseController
{
    public function index()
    {
        return view('evaluacion/preguntas');
    }

    public function enviar()
    {
        $preguntasEvalModel = new PreguntasEvalModel();

        $data = [
            'p1' => $this->request->getPost('p1'),
            'p2' => $this->request->getPost('p2')
        ];

        $preguntasEvalModel->insert($data);

        return redirect()->to('evaluacion/agradecimiento');
    }

    public function agradecimiento()
    {
        return view('evaluacion/agradecimiento');
    }

}
