<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pembayaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pembayaran' => ['type' => 'INT', 'auto_increment' => true],
            // Match parent pemesanan.id_pemesanan which is INT (signed)
            'id_pemesanan' => ['type' => 'INT'],
            'tanggal_bayar' => ['type' => 'DATE'],
            'jumlah_bayar' => ['type' => 'DOUBLE'],
            'bukti_bayar' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'status_bayar' => ['type' => "ENUM('menunggu','terverifikasi','gagal')", 'default' => 'menunggu'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id_pembayaran', true);
        $this->forge->addForeignKey('id_pemesanan', 'pemesanan', 'id_pemesanan', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pembayaran');
    }

    public function down()
    {
        $this->forge->dropTable('pembayaran');
    }
}