<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TodoSeeder extends Seeder
{
    public function run()
    {
        // usando funcion de ayuda.
        $this->call('CategoriaSeeder');
        $this->call('PeliculaSeeder');
        $this->call('EtiquetaSeeder');
    }
}
