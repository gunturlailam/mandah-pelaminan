<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Metodepembayaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_metode' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'nama_metode' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_metode', true);
        $this->forge->createTable('metode_pembayaran');
    }

    public function down()
    {
        $this->forge->dropTable('metode_pembayaran');
    }
}