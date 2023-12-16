<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfesorAsignaturaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'profesorasignatura';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['profesor', 'asignatura'];
}
