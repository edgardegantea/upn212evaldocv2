<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class PeriodoEducativo extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'codigo'                => ['type' => 'varchar', 'constraint' => 10],
            'nombre'                => ['type' => 'varchar', 'constraint' => 50],
            'tipo'                  => ['type' => 'varchar', 'constraint' => 50],
            'duracion'              => ['type' => 'varchar', 'constraint' => 50],
            'periodoDeEvaluacion'   => ['type' => 'varchar', 'constraint' => 50],
            'created_at'            => ['type' => 'timestamp', 'default' => new RawSql('CURRENT_TIMESTAMP')],
            'updated_at'            => ['type' => 'timestamp', 'null' => true],
            'deleted_at'            => ['type' => 'timestamp', 'null' => true]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('programaeducativo', true);
    }

    public function down()
    {
        $this->forge->dropTable('programaeducativo', true);
    }
}
