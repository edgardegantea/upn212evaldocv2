<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Database\Migrations\EstudianteAsignatura;
use App\Models\AsignaturaModel;
use App\Models\EstudianteAsignaturaModel;
use App\Models\PreguntasEvalModel;
use App\Models\UsuarioModel;

class PreguntasEvalController extends BaseController
{

    private $db;

    public function __construct()
    {
        helper(['url', 'form', 'session']);
        $this->db = db_connect();
        $this->session = \Config\Services::session();
    }


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


    public function cargarAsignaturasPorEstudiante()
    {
        $estudianteModel = new UsuarioModel();
        $asignaturaModel = new EstudianteAsignaturaModel();

        $estudiantes = $estudianteModel->findAll();
        $data = [];

        $db = \Config\Database::connect();
        $this->session = \Config\Services::session();

        $builder = $this->db->table('asignaturas as a');
        $builder->select('a.*');
        $builder->join('preguntaseval as p', 'a.id = p.id');
        $asignaturas2 = $builder->get()->getResult();

        foreach ($estudiantes as $estudiante) {
            $asignaturas = $asignaturaModel->where('estudiante', $estudiante['id'])->findAll();
            $data[] = [
                'estudiante'    => $estudiante,
                'asignaturas'   => $asignaturas,
                'asignaturas2'  => $asignaturas2
            ];
        }

        // return view('evaluacion/ea', ['data' => $data]);
        dd(['data' => $data]);
    }


    public function pp()
    {
        $estudianteModel = new UsuarioModel();
        $asignaturaModel = new EstudianteAsignaturaModel();

        $estudiantes = $estudianteModel->findAll();
        $data = [];

        foreach ($estudiantes as $estudiante) {
            $asignaturas = $asignaturaModel->where('estudiante', $estudiante['id'])->findAll();
            $data[] = [
                'estudiante'    => $estudiante,
                'asignaturas'   => $asignaturas
            ];
        }

        return view('evaluacion/p', ['data' => $data]);
    }




}
