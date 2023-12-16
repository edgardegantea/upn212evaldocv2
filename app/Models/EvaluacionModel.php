<?php

namespace App\Models;

use CodeIgniter\Model;

class EvaluacionModel extends Model
{
    protected $table = 'evaluacion';
    protected $primaryKey = 'id';
    protected $allowedFields = ['asignatura_id', 'profesor_id', 'respuestas', 'comentario', 'periodo', 'codigo_referencia', 'evaluador'];

    // protected $useTimestamps = true;
    // protected $createdField = 'created_at';
    // protected $updatedField = 'updated_at';

    protected $casts = [
        'respuestas' => 'json' // Para tratar el campo 'respuestas' como JSON
    ];

    public function obtenerEvaluacionesPorAsignatura($asignaturaId)
    {
        return $this->where('asignatura_id', $asignaturaId)->findAll();
    }

    public function obtenerProfesoresPorAsignatura($profesorId)
    {
        return $this->where('profesor_id', $profesorId)->findAll();
    }


    public function obtenerDatosJson($id)
    {
        return $this->select('respuestas')->find($id);
    }
}
