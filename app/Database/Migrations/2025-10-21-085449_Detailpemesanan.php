<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Detailpemesanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_detail' => ['type' => 'INT', 'auto_increment' => true],
            // Match parent `pemesanan.id_pemesanan` which is currently INT (signed)
            'id_pemesanan' => ['type' => 'INT'],
            // Match parent `pelaminan.id_pelaminan` which is INT UNSIGNED
            'id_pelaminan' => ['type' => 'INT', 'unsigned' => true],
            'jumlah' => ['type' => 'INT', 'constraint' => 11],
            'harga_satuan' => ['type' => 'DOUBLE'],
            'subtotal' => ['type' => 'DOUBLE'],
        ]);
        $this->forge->addKey('id_detail', true);
        // Use CASCADE actions; SET NULL would require nullable columns
        $this->forge->addForeignKey('id_pemesanan', 'pemesanan', 'id_pemesanan', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_pelaminan', 'pelaminan', 'id_pelaminan', 'CASCADE', 'CASCADE');
        $this->forge->createTable('detail_pemesanan');
    }

    public function down()
    {
        $this->forge->dropTable('detail_pemesanan');
    }
}