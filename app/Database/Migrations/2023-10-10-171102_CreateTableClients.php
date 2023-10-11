<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableClients extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 70,
            ],

            'email' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],

            'phone' => [
                'type'           => 'VARCHAR',
                'constraint'     => 14,
                'comment'        => '(99)99999-9999'
            ],

            'address' => [
                'type'           => 'VARCHAR',
                'constraint'     => 128,
                'comment'        => 'Endereço do cliente'
            ],

            'created_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
                'default'        => null,
            ],

            'updated_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
                'default'        => null,
            ],
        ]);


        $this->forge->addKey('id', true);
        $this->forge->addKey('name');
        $this->forge->addKey('email');
        $this->forge->addKey('phone');

        $this->forge->createTable('clients');
    }

    public function down()
    {
        $this->forge->dropTable('clients');
    }
}
