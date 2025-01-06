<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Karyawan extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama_depan' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'nama_belakang' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'departemen' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        // Membuat tabel news
        $this->forge->createTable('karyawan', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('karyawan');
    }
}
