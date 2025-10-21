<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pemesanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pemesanan' => ['type' => 'INT', 'auto_increment' => true],
            'id_customer' => ['type' => 'INT', 'unsigned' => true],
            'id_pegawai' => ['type' => 'INT', 'unsigned' => true],
            'id_metode' => ['type' => 'INT', 'unsigned' => true],
            'tanggal_pesan' => ['type' => 'DATE'],
            'tanggal_acara' => ['type' => 'DATE'],
            'total_bayar' => ['type' => 'DOUBLE'],
            'status_pemesanan' => ['type' => "ENUM('pending','dibayar','proses','selesai','batal')", 'default' => 'pending'],
            'catatan' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id_pemesanan', true);
        $this->forge->addForeignKey('id_customer', 'customer', 'id_customer', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_pegawai', 'pegawai', 'id_pegawai', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_metode', 'metode_pembayaran', 'id_metode', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pemesanan');
    }

    public function down()
    {
        $this->forge->dropTable('pemesanan');
    }
}