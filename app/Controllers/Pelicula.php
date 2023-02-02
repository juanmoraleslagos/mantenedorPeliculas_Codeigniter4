<?php

namespace App\Controllers;

use App\Models\PeliculaModel;

class Pelicula extends BaseController
{

    public function show($id)
    {
        // Instanciando Y Ocupando Metodos.
        $peliculaModel = new PeliculaModel();
        $pelicula = $peliculaModel->find($id);

        //Renderizando Vista.
        return view('pelicula/show', [
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
        return view('pelicula/new', $data);
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

        echo 'Registro Creado';
    }

    public function edit($id)
    {
        // Instanciando Y Ocupando Metodos.
        $peliculaModel = new PeliculaModel();
        $pelicula = $peliculaModel->find($id);

        // Enviando Datos A La Vista.
        return view('pelicula/edit', [
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

        echo 'Actualizando Datos';
    }

    public function delete($id)
    {
        // Instanciando Y Creando Métodos.
        $peliculaModel = new PeliculaModel();
        $peliculaModel->delete($id);

        echo "REGISTRO ELIMINADO";
    }

    public function index()
    {
        // Instanciando Y Ocupando Metodos.
        $peliculaModel = new PeliculaModel();
        $peliculas = $peliculaModel->findAll();

        // Enviando Datos A La Vista.
        return view('pelicula/index', [
            'peliculas'  => $peliculas,
        ]);
    }
}
