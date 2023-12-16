<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Profesor extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id'                => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nombre'            => ['type' => 'varchar', 'constraint' => 150],
            // 'apellidoPaterno'   => ['type' => 'varchar', 'constraint' => 50],
            // 'apellidoMaterno'   => ['type' => 'varchar', 'constraint' => 50],
            'foto'              => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'area'              => ['type' => 'int', 'constraint' => 11, 'auto_increment' => false, 'unsigned' => true, 'null' => true]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('area', 'areas', 'id', 'SET_NULL', 'SET_NULL');
        $this->forge->createTable('profesores', true);
        
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('profesores', true);
    }
}
