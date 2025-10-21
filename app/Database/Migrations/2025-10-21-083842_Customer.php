<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Customer extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_customer' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'nama_customer' => ['type' => 'VARCHAR', 'constraint' => 100],
            'alamat' => ['type' => 'TEXT'],
            'no_hp' => ['type' => 'VARCHAR', 'constraint' => 20],
            'email' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'wilayah_id' => ['type' => 'INT', 'unsigned' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id_customer', true);
        $this->forge->addForeignKey('wilayah_id', 'wilayah', 'id_wilayah', 'CASCADE', 'CASCADE');
        $this->forge->createTable('customer');
    }

    public function down()
    {
        $this->forge->dropTable('customer');
    }
}