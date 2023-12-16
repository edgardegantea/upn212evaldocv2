<?php

namespace App\Models;

use CodeIgniter\Model;

class AsignarED extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'asignared';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['evaluacion', 'asignatura'];
}
