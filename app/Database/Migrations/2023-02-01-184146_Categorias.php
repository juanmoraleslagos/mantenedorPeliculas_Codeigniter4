<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categorias extends Migration
{
    public function up()
    {
        // Definiendo Campos De Tabla.
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'titulo' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255
            ]
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('categorias');
    }

    public function down()
    {
        // Borrando Tabla Películas.
        $this->forge->dropTable('categorias');
    }
}
