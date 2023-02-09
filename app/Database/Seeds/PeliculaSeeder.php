<?php

namespace App\Database\Seeds;

use App\Models\PeliculaModel;
use CodeIgniter\Database\Seeder;

class PeliculaSeeder extends Seeder
{
    public function run()
    {
        $peliculaModel = new PeliculaModel();

        // borrando datos anteriores.        
        $peliculaModel->where('id >=', 1)->delete();

        // generado e insertando semillas.
        for ($i = 0; $i <= 20; $i++) {
            $data = [
                'titulo'      => "Película    $i",
                'descripcion' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
            ];

            // insertando semillas.
            $peliculaModel->insert($data);
        }
    }
}
