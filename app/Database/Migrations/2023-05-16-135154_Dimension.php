<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dimension extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nombre'        => ['type' => 'varchar', 'constraint' => 100, 'unique' => true],
            'descripcion'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'promedio'      => ['type' => 'float', 'default' => 0.0, 'null' => true]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('dimensiones', true);
    }

    public function down()
    {
        $this->forge->dropTable('dimensiones', true);
    }
}
