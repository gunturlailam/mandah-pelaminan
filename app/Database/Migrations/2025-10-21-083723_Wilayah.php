<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Wilayah extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_wilayah' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'nama_wilayah' => ['type' => 'VARCHAR', 'constraint' => 100],
            'ongkir' => ['type' => 'DOUBLE', 'default' => 0],
        ]);
        $this->forge->addKey('id_wilayah', true);
        $this->forge->createTable('wilayah');
    }

    public function down()
    {
        $this->forge->dropTable('wilayah');
    }
}