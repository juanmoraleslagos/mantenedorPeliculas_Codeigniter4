<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Peliculas extends Migration
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
            'categoria_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => TRUE
            ],
            'titulo' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255
            ],
            'descripcion' => [
                'type'           => 'TEXT',
                'null'           => TRUE,
            ]
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('categoria_id', 'categorias', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('peliculas');
    }

    public function down()
    {
        // Borrando Tabla Películas.
        $this->forge->dropTable('peliculas');
    }
}