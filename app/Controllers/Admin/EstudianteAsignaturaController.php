<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EstudianteAsignaturaModel;
use App\Models\UsuarioModel;
use App\Models\AsignaturaModel;

class EstudianteAsignaturaController extends BaseController
{
    public function index()
    {
        $estudianteModel = new UsuarioModel();
        $asignaturaModel = new AsignaturaModel();

        $data = [
            'estudiantes' => $estudianteModel->findAll(),
            'asignaturas' => $asignaturaModel->findAll()
        ];

        return view('admin/estudianteasignatura/index', $data);
    }

    public function guardarAsignacion()
    {
        $estudianteModel = new UsuarioModel();
        $asignaturaModel = new AsignaturaModel();

        $estudiantes   = $estudianteModel->findAll();
        $asignaturas   = $asignaturaModel->findAll();

        if ($this->request->getMethod() === 'post') {
            $estudianteId = $this->request->getPost('estudiante');
            $asignaturasSeleccionadas = $this->request->getPost('asignaturas');

            $estudianteAsignaturaModel = new EstudianteAsignaturaModel();

            // Eliminar asignaciones anteriores
            $estudianteAsignaturaModel->where('estudiante', $estudianteId)->delete();

            // Asignar nuevas materias
            foreach ($asignaturasSeleccionadas as $asignaturaId) {
                $estudianteAsignaturaModel->insert(['estudiante' => $estudianteId, 'asignatura' => $asignaturaId]);
            }


        }

        // return view('assign_subjects', ['teachers' => $teachers, 'subjects' => $subjects]);
        return 'Proceso correcto';
    }
}
