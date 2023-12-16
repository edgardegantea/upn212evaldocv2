<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class PeriodoEscolar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'auto_increment' => true, 'unsigned' => true],
            'nombre'        => ['type' => 'varchar', 'constraint' => 50, 'null' => true, 'unique' => true],
            'codigo'        => ['type' => 'varchar', 'constraint' => 30, 'unique' => true],
            'tipo'          => ['type' => 'varchar', 'constraint' => 50, 'null' => true],
            'fechaInicio'   => ['type' => 'datetime', 'null' => true],
            'fechaFin'      => ['type' => 'datetime', 'null' => true],
            'created_at'    => ['type' => 'timestamp', 'default' => new RawSql('CURRENT_TIMESTAMP')],
            'updated_at'    => ['type' => 'timestamp', 'null' => true],
            'deleted_at'    => ['type' => 'timestamp', 'null' => true]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('periodoescolar', true);
    }

    public function down()
    {
        $this->forge->dropTable('periodoescolar', true);
    }
}
