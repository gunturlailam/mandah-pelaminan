<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengiriman extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengiriman' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'id_pemesanan' => ['type' => 'INT'],
            'id_pegawai' => ['type' => 'INT', 'unsigned' => true],
            'tanggal_kirim' => ['type' => 'DATE'],
            'alamat_tujuan' => ['type' => 'TEXT'],
            'status_kirim' => ['type' => "ENUM('menunggu','dikirim','selesai')", 'default' => 'menunggu'],
            'catatan' => ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addKey('id_pengiriman', true);
        $this->forge->addForeignKey('id_pemesanan', 'pemesanan', 'id_pemesanan', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_pegawai', 'pegawai', 'id_pegawai', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pengiriman');
    }

    public function down()
    {
        $this->forge->dropTable('pengiriman');
    }
}