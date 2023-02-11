<?php

namespace App\Database\Seeds;

use App\Models\CategoriaModel;
use CodeIgniter\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        // $this->db->table('categorias');
        $categoriaModel = new CategoriaModel();

        // borrando datos anteriores.
        //$this->db->table('categorias')->where('id >=', 1)->delete();
        $categoriaModel->where('id >=', 1)->delete();

        // generado e insertando semillas.
        for ($i = 0; $i <= 10; $i++) {
            $data = [
                'titulo' => "Categoría $i"
            ];

            // insertando semillas.
            //$this->db->table('categorias')->insert($data);
            $categoriaModel->insert($data);
        }
    }
}
