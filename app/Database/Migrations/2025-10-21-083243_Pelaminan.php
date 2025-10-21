<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pelaminan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pelaminan' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_kategori' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'nama_pelaminan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'harga_sewa' => [
                'type' => 'DOUBLE',
            ],
            'stok' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id_pelaminan', true);
        $this->forge->addForeignKey('id_kategori', 'kategori_pelaminan', 'id_kategori', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pelaminan');
    }

    public function down()
    {
        $this->forge->dropTable('pelaminan');
    }
}