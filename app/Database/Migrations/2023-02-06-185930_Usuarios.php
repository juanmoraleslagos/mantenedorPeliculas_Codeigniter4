<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuarios extends Migration
{
    public function up()
    {
        // creando atributos.
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'usuario' => [
                'type'         => 'VARCHAR',
                'constraint'   => 20,
                'unique'       => TRUE,
            ],
            'email' => [
                'type'         => 'VARCHAR',
                'constraint'   => 100,
                'unique'       => TRUE
            ],
            'contrasena' => [
                'type'         => 'VARCHAR',
                'constraint'   => 255,
                'unique'       => TRUE,
            ],
            'tipo' => [
                'type'         => 'ENUM',
                'constraint'   => ['admin', 'regular'],
                'default'      => 'regular'
            ],
        ]);

        // agregando primary key.
        $this->forge->addKey('id', TRUE);

        // creando tabla usuarios.
        $this->forge->createTable('usuarios');
    }

    public function down()
    {
        // eliminando tabla usuarios.
        $this->forge->dropTable('usuarios');
    }
}
