<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EvaluacionModel;
use App\Models\UsuarioModel;
use App\Models\PreguntasEvalModel;

class AdminController extends BaseController
{

    public function __construct()
    {
        if (session()->get('rol') != "admin") {
            echo view('accesonoautorizado');
            exit;
        }
    }




    public function index()
    {

        $evaluacionModel = new EvaluacionModel();
        $usuarioModel = new UsuarioModel();
        $preguntaModel = new PreguntasEvalModel();

        // Contar cantidad de profesores evaluados
        $distinctProfessorsCount = $evaluacionModel
            ->distinct()
            ->select('profesor_id')
            ->countAllResults();


        // Contar cantidad de asignatras evaluadas
        $distinctSubjectsCount = $evaluacionModel
            ->distinct()
            ->select('asignatura_id')
            ->countAllResults();


        
        // Contar cantidad de estudiantes
        $studentCount = $usuarioModel
            ->where('rol', 'estudiante')
            ->countAllResults();



        $evaluations = $evaluacionModel->findAll();

        $totalQuestionsCount = 0;

        foreach ($evaluations as $evaluation) {
            $respuestas = json_decode($evaluation['respuestas'], true);
            $totalQuestionsCount = count($respuestas);
        }

        // Pass the total questions count to the view
        $data['preguntas'] = $totalQuestionsCount;

        
        //$data['preguntas'] = $preguntaModel->countAll();
        $data['studentCount'] = $studentCount;
        $data['distinctSubjectsCount'] = $distinctSubjectsCount;
        $data['distinctProfessorsCount'] = $distinctProfessorsCount;


        return view('admin/dashboard', $data);
    }




    public function perfil()
    {
        return view('admin/perfil/index');
    }

}