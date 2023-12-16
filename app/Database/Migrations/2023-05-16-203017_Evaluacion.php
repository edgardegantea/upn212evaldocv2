<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Evaluacion extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'asignatura_id'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false],
            'profesor_id'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => false],
            'respuestas'    => ['type' => 'longtext', 'null' => true],
            'comentario'    => ['type' => 'text', 'null' => true],
            'created_at'    => ['type' => 'timestamp', 'default' => new RawSql('CURRENT_TIMESTAMP')],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('asignatura_id', 'asignaturas', 'id');
        $this->forge->addForeignKey('profesor_id', 'profesores', 'id');

        $this->forge->createTable('evaluacion', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('evaluacion', true);
    }
}
