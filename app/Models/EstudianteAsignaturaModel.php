<?php

namespace App\Models;

use CodeIgniter\Model;

class EstudianteAsignaturaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'estudianteasignatura';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['estudiante', 'asignatura'];
}
