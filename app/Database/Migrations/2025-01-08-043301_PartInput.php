<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PartInput extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'part_code' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'unique' => true,
            ],
            'part_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'unique' => true,
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('parts');
    }

    public function down()
    {
        $this->forge->dropTable('parts');
    }
}
