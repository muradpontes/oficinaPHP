<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableServices extends Migration
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

            'numero_os' => [
                'type'           => 'VARCHAR',
                'constraint'     => 70,
            ],

            'created_at' => [
                'type'           => 'DATE',
                'null'           => true,
                'default'        => null,
            ],

            'description' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],

            'total' => [
                'type'           => 'DECIMAL(10,2)',
                'null'           => false,
            ],

            'veiculo_associado' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
        ]);


        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('veiculo_associado', 'vehicles', 'id');

        $this->forge->createTable('services');
    }

    public function down()
    {
        $this->forge->dropTable('services');
    }
}
