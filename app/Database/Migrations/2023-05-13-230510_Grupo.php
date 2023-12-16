<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Grupo extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'clave'   => ['type' => 'varchar', 'constraint' => 20],
            'nombre'        => ['type' => 'varchar', 'constraint' => 50, 'unique' => true],
            // 'estudiante'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false],
            // 'asignatura'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false],
            // 'profesor'      => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_incremnet' => false]
            // 'created_at'    => ['type' => 'timestamp', 'default' => new RawSql('CURRENT_TIMESTAMP')],
            // 'updated_at'    => ['type' => 'timestamp', 'null' => true],
            // 'deleted_at'    => ['type' => 'timestamp', 'null' => true]
        ]);

        $this->forge->addKey('id', true);
        // $this->forge->addForeignKey('estudiante', 'usuarios', 'id');
        // $this->forge->addForeignKey('asignatura', 'asignaturas', 'id');


        $this->forge->createTable('grupos', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('grupos', true);
    }
}
