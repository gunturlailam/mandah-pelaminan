<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KategoriPelaminan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kategori' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_kategori' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_kategori', true);
        $this->forge->createTable('kategori_pelaminan');
    }

    public function down()
    {
        $this->forge->dropTable('kategori_pelaminan');
    }
}