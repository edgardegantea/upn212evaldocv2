<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Usuario extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'rol'           => ['type' => 'varchar', 'constraint' => 20, 'default' => "estudiante"],
            'codigo'        => ['type' => 'varchar', 'constraint' => 20, 'unique' => true, 'null' => true],
            'nombre'        => ['type' => 'varchar', 'constraint' => 100],
            'apaterno'      => ['type' => 'varchar', 'constraint' => 50, 'null' => true],
            'amaterno'      => ['type' => 'varchar', 'constraint' => 50, 'null' => true],
            'curp'              => ['type' => 'varchar', 'constraint' => 18, 'unique' => true, 'null' => true],
            'email'             => ['type' => 'varchar', 'constraint' => 100, 'unique' => true],
            'password'          => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'foto'              => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'sexo'              => ['type' => 'varchar', 'constraint' => 10],
            'fechaNacimiento'   => ['type' => 'datetime', 'null' => true],
            'bio'               => ['type' => 'varchar', 'constraint' => 500, 'null' => true, 'default' => 'Estudiante'],
            'status'            => ['type' => 'varchar', 'constraint' => 20, 'default' => 'activo'],
            'created_at'        => ['type' => 'timestamp', 'default' => new RawSql('CURRENT_TIMESTAMP')],
            'updated_at'        => ['type' => 'timestamp', 'null' => true],
            'deleted_at'        => ['type' => 'timestamp', 'null' => true]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('usuarios', true);
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('usuarios', true);
    }
}
