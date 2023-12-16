<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pregunta extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'pregunta'  => ['type' => 'varchar', 'constraint' => 500, 'unique' => true],
            'dimension' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('dimension', 'dimensiones', 'id');
        $this->forge->createTable('preguntas', true);
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('preguntas', true);
    }
}
