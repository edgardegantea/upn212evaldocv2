<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Asignatura extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id'                => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'clave'             => ['type' => 'varchar', 'constraint' => 10],
            'nombre'            => ['type' => 'varchar', 'constraint' => 255],
            'descripcion'       => ['type' => 'text', 'null' => true],
            'creditos'          => ['type' => 'int'],
            'horasSemana'       => ['type' => 'int'],
            'temario'           => ['type' => 'text', 'null' => true],
            'temarioArchivo'    => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_at'        => ['type' => 'timestamp', 'default' => new RawSql('CURRENT_TIMESTAMP')],
            'updated_at'        => ['type' => 'timestamp', 'null' => true],
            'deleted_at'        => ['type' => 'timestamp', 'null' => true]
        ]);

        $this->forge->addKey('id', true);
        // $this->forge->addForeignKey('ed', 'pregunaseval', 'id');
        $this->forge->createTable('asignaturas', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('asignaturas', true);
    }
}
