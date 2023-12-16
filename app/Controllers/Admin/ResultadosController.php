<?php

namespace App\Controllers\Admin;

use App\Models\EvaluacionModel;
use App\Models\ProfesorModel;
use App\Models\AsignaturaModel;
use CodeIgniter\Controller;

class ResultadosController extends Controller
{
    public function respuestasPorProfesor($profesorId)
    {
        // Create instances of the EvaluacionModel, ProfesorModel, and AsignaturaModel
        $evaluacionModel = new EvaluacionModel();
        $profesorModel = new ProfesorModel();
        $asignaturaModel = new AsignaturaModel();
        
        // Retrieve responses for a specific professor with additional data
        $evaluaciones = $evaluacionModel
            ->select('evaluacion.*, profesores.nombre as profesor_nombre, asignaturas.nombre as asignatura_nombre')
            ->join('profesores', 'profesores.id = evaluacion.profesor_id')
            ->join('asignaturas', 'asignaturas.id = evaluacion.asignatura_id')
            ->where('evaluacion.profesor_id', $profesorId)
            ->where('evaluacion.created_at >', '2023-11-01 00:00:00')
            ->findAll();
        
        // Pass the data to the view
        $data['evaluaciones'] = $evaluaciones;
        
        return view('evaluacion/respuestasPorProfesor', $data);
    }
}
