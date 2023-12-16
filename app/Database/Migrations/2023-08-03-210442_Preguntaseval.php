<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Preguntaseval extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'asignatura_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false],
            'p1'            => ['type' => 'int', 'null' => true, 'default' => 0],
            'p2'            => ['type' => 'int', 'null' => true, 'default' => 0],
            'p3'            => ['type' => 'int', 'null' => true, 'default' => 0],
            'p4'            => ['type' => 'int', 'null' => true, 'default' => 0],
            'p5'            => ['type' => 'int', 'null' => true, 'default' => 0],
            'p6'            => ['type' => 'int', 'null' => true, 'default' => 0],
            'p7'            => ['type' => 'int', 'null' => true, 'default' => 0],
            'p8'            => ['type' => 'int', 'null' => true, 'default' => 0],
            'p9'            => ['type' => 'int', 'null' => true, 'default' => 0],
            'p10'           => ['type' => 'int', 'null' => true, 'default' => 0],
            'p11'           => ['type' => 'int', 'null' => true, 'default' => 0],
            'p12'           => ['type' => 'int', 'null' => true, 'default' => 0],
            'p13'           => ['type' => 'int', 'null' => true, 'default' => 0],
            'p14'           => ['type' => 'int', 'null' => true, 'default' => 0],
            'p15'           => ['type' => 'int', 'null' => true, 'default' => 0],
            'p16'           => ['type' => 'int', 'null' => true, 'default' => 0],
            'p17'           => ['type' => 'int', 'null' => true, 'default' => 0],
            'p18'           => ['type' => 'int', 'null' => true, 'default' => 0],
            'p19'           => ['type' => 'int', 'null' => true, 'default' => 0],
            'p20'           => ['type' => 'int', 'null' => true, 'default' => 0],
            'p21'           => ['type' => 'int', 'null' => true, 'default' => 0],
            'p22'           => ['type' => 'int', 'null' => true, 'default' => 0],
            'p23'           => ['type' => 'int', 'null' => true, 'default' => 0],
            'p24'           => ['type' => 'int', 'null' => true, 'default' => 0],
            'p25'           => ['type' => 'int', 'null' => true, 'default' => 0],
            'p26'           => ['type' => 'int', 'null' => true, 'default' => 0],
            'p27'           => ['type' => 'int', 'null' => true, 'default' => 0],
            'p28'           => ['type' => 'int', 'null' => true, 'default' => 0],
            'comentarios'   => ['type' => 'text', 'null' => true]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('asignatura_id', 'asignaturas', 'id');
        $this->forge->createTable('preguntaseval', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('preguntaseval', true);
    }
}
