<?php

namespace App\Controllers\Dashboard;

use App\Models\PeliculaModel;
use App\Controllers\BaseController;

class Pelicula extends BaseController
{

    public function show($id)
    {
        // Instanciando Y Ocupando Metodos.
        $peliculaModel = new PeliculaModel();
        $pelicula = $peliculaModel->find($id);

        //Renderizando Vista.
        return view('/dashboard/pelicula/show', [
            'pelicula'  => $pelicula,
        ]);
    }

    public function new()
    {
        // Creando Data.
        $data = [
            'pelicula' => [
                'titulo'      => '',
                'descripcion' => '',
            ]
        ];

        //Renderizando Vista.
        return view('/dashboard/pelicula/new', $data);
    }

    public function create()
    {
        // Creando Instancia.
        $peliculaModel = new PeliculaModel();

        // Creando Data.
        $data = [
            'titulo'      => $this->request->getPost('titulo'),
            'descripcion' => $this->request->getPost('descripcion'),
        ];

        // Insertando Nuevo Registro En Base De Datos.
        $peliculaModel->insert($data);

        return redirect()->to('/dashboard/pelicula');
    }

    public function edit($id)
    {
        // Instanciando Y Ocupando Metodos.
        $peliculaModel = new PeliculaModel();
        $pelicula = $peliculaModel->find($id);

        // Enviando Datos A La Vista.
        return view('/dashboard/pelicula/edit', [
            'pelicula' => $pelicula
        ]);
    }

    public function update($id)
    {
        // Instanciando Y Ocupando Métodos.
        $peliculaModel = new PeliculaModel();

        // Creando La Data.
        $data = [
            'titulo'      => $this->request->getPost('titulo'),
            'descripcion' => $this->request->getPost('descripcion'),
        ];

        // Actualizando Datos.
        $peliculaModel->update($id, $data);

        return redirect()->to('/dashboard/pelicula');
    }

    public function delete($id)
    {
        // Instanciando Y Creando Métodos.
        $peliculaModel = new PeliculaModel();
        $peliculaModel->delete($id);

        return redirect()->back();
    }

    public function index()
    {
        // Instanciando Y Ocupando Metodos.
        $peliculaModel = new PeliculaModel();
        $peliculas = $peliculaModel->findAll();

        // Enviando Datos A La Vista.
        return view('/dashboard/pelicula/index', [
            'peliculas'  => $peliculas,
        ]);
    }
}
