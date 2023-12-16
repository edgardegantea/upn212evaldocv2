<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Area extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'auto_increment' => true, 'unsigned' => true],
            'nombre'        => ['type' => 'varchar', 'constraint' => 150, 'unique' => true],
            'descripcion'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('areas', true);
    }

    public function down()
    {
        $this->forge->dropTable('areas', true);
    }
}
