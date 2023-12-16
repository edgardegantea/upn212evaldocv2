<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Sede extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nombre'        => ['type' => 'varchar', 'constraint' => 255, 'unique' => true],
            'telefono'      => ['type' => 'varchar', 'constraint' => 20, 'null' => true],
            'email'         => ['type' => 'varchar', 'constraint' => 100, 'null' => true],
            'website'       => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'facebook'      => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_at'    => ['type' => 'timestamp', 'default' => new RawSql('CURRENT_TIMESTAMP')],
            'updated_at'    => ['type' => 'timestamp', 'null' => true],
            'deleted_at'    => ['type' => 'timestamp', 'null' => true]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('sedes', true);
    }

    public function down()
    {
        $this->forge->dropTable('sedes', true);
    }
}
