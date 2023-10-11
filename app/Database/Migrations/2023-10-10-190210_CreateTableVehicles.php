<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableVehicles extends Migration
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

            'brand' => [
                'type'           => 'VARCHAR',
                'constraint'     => 70,
            ],

            'model' => [
                'type'           => 'VARCHAR',
                'constraint'     => 70,
            ],

            'year' => [
                'type'           => 'INT',
                'constraint'     => 4,
            ],

            'license_plate' => [
                'type'           => 'VARCHAR',
                'constraint'     => 7,
                'comment'        => 'AAA0A00'
            ],

            'client_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            
        ]);


        $this->forge->addKey('id', true);
        $this->forge->addKey('license_plate');
        $this->forge->addForeignKey('client_id', 'clients', 'id');

        $this->forge->createTable('vehicles');
    }

    public function down()
    {
        $this->forge->dropTable('vehicles');
    }
}
