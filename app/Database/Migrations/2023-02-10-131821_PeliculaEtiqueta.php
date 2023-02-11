<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PeliculaEtiquetas extends Migration
{
    public function up()
    {
        // agregando campos.
        $this->forge->addField(
            [
                'pelicula_id' => [
                    'type'           => 'INT',
                    'constraint'     => 5,
                    'unsigned'       => TRUE
                ],
                'etiqueta_id' => [
                    'type'           => 'INT',
                    'constraint'     => 5,
                    'unsigned'       => TRUE
                ]
            ]
        );

        // añadiendo foreign key.
        $this->forge->addForeignKey('pelicula_id', 'peliculas', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('etiqueta_id', 'etiquetas', 'id', 'CASCADE', 'CASCADE');
        
        // creando tabla.
        $this->forge->createTable('pelicula_etiqueta');
    }

    public function down()
    {
        // eliminando tabla.
        $this->forge->dropTable('pelicula_etiqueta');
    }
}
