<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Imagenes extends Migration
{
    public function up()
    {
        // agregando campos.
        $this->forge->addField(
            [
                'id' => [
                    'type'           => 'INT',
                    'constraint'     => 5,
                    'unsigned'       => TRUE,
                    'auto_increment' => TRUE
                ],
                'imagen' => [
                    'type'           => 'VARCHAR',
                    'constraint'     => 255
                ],
                'extension' => [
                    'type'           => 'VARCHAR',
                    'constraint'     => 255
                ],
                'data' => [
                    'type'           => 'VARCHAR',
                    'constraint'     => 500
                ]
            ]
        );

        // creando tabla y primary key.
        $this->forge->addKey('id');
        $this->forge->createTable('imagenes');
    }

    public function down()
    {
        // borrando tabla.
        $this->forge->dropTable('imagenes');
    }
}
