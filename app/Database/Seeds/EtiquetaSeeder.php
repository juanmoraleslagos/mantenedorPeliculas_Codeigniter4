<?php

namespace App\Database\Seeds;

use App\Models\CategoriaModel;
use App\Models\EtiquetaModel;
use CodeIgniter\Database\Seeder;

class EtiquetaSeeder extends Seeder
{
    public function run()
    {
        // instanciando.
        $etiquetaModel  = new EtiquetaModel();
        $categoriaModel = new CategoriaModel();

        // obteniendo categorias.
        $categorias = $categoriaModel->findAll();

        // borrando etiquetas.
        $etiquetaModel->where('id >=', 1)->delete();

        // generando semillas.
        foreach ($categorias as $categoria) {
            for ($i = 0; $i <= 10; $i++) {
                $etiquetaModel->insert(
                    [
                        'titulo'       => "Tag - $i $categoria->titulo",
                        'categoria_id' => $categoria->id
                    ]
                );
            }
        }
    }
}
