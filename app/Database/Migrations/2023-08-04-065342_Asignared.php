<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Asignared extends Migration
{
    public function up()
    {
        /*
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'evaluacion'      => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false],
            'asignatura'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('evaluacion', 'preguntaseval', 'id');
        $this->forge->addForeignKey('asignatura', 'asignaturas', 'id');

        $this->forge->createTable('asignared', true);

        $this->db->enableForeignKeyChecks();
        */
    }

    public function down()
    {
        // $this->forge->dropTable('asignared', true);
    }
}
