<?php

namespace App\Models;

use CodeIgniter\Model;

class GrupoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'grupos';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['clave', 'nombre'];
}
