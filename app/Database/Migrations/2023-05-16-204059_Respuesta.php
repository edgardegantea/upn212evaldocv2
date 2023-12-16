<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Respuesta extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'respuesta' => ['type' => 'varchar', 'constraint' => 50]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('respuestas', true);
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('respuestas', true);
    }
}
