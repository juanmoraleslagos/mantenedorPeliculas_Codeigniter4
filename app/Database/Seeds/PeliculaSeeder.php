<?php

namespace App\Database\Seeds;

use App\Models\PeliculaModel;
use App\Models\CategoriaModel;
use CodeIgniter\Database\Seeder;

class PeliculaSeeder extends Seeder
{
    public function run()
    {
        $peliculaModel  = new PeliculaModel();
        $categoriaModel = new CategoriaModel();

        $categorias = $categoriaModel->limit(20)->findAll();

        // borrando datos anteriores.        
        $peliculaModel->where('id >=', 1)->delete();

        foreach ($categorias as $categoria) {
            // generado e insertando semillas.
            for ($i = 0; $i <= 10; $i++) {
                $data = [
                    'titulo'       => "Película    $i",
                    'categoria_id' => $categoria->id,
                    'descripcion'  => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
                ];

                // insertando semillas.
                $peliculaModel->insert($data);
            }
        }
    }
}
