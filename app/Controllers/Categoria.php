<?php

namespace App\Controllers;

use App\Models\CategoriaModel;

class Categoria extends BaseController
{

    public function index()
    {
        // Instanciando Y Ocupando Metodos.
        $categoriaModel = new CategoriaModel();
        $categorias = $categoriaModel->findAll();

        // Enviando Datos A La Vista.
        return view('categoria/index', [
            'categorias'  => $categorias,
        ]);
    }

    public function new()
    {
        // Creando Data.
        $data = [
            'categoria' => [
                'titulo'      => '',
            ]
        ];

        //Renderizando Vista.
        return view('categoria/new', $data);
    }

    public function create()
    {
        // Creando Instancia.
        $categoriaModel = new CategoriaModel();

        // Creando Data.
        $data = [
            'titulo'      => $this->request->getPost('titulo'),            
        ];

        // Insertando Nuevo Registro En Base De Datos.
        $categoriaModel->insert($data);

        echo 'Registro Creado';
    }

    public function show($id)
    {
        // Instanciando Y Ocupando Metodos.
        $categoriaModel = new CategoriaModel();
        $categoria = $categoriaModel->find($id);

        //Renderizando Vista.
        return view('categoria/show', [
            'categoria'  => $categoria,
        ]);
    }

    public function delete($id)
    {
        // Instanciando Y Creando Métodos.
        $categoriaModel = new CategoriaModel();
        $categoriaModel->delete($id);

        echo "REGISTRO ELIMINADO";
    }

    public function edit($id)
    {
        // Instanciando Y Ocupando Metodos.
        $categoriaModel = new CategoriaModel();
        $categoria = $categoriaModel->find($id);

        // Enviando Datos A La Vista.
        return view('categoria/edit', [
            'categoria' => $categoria
        ]);
    }

    public function update($id)
    {
        // Instanciando Y Ocupando Métodos.
        $categoriaModel = new CategoriaModel();

        // Creando La Data.
        $data = [
            'titulo'      => $this->request->getPost('titulo'),            
        ];

        // Actualizando Datos.
        $categoriaModel->update($id, $data);

        echo 'Actualizando Datos';
    }
}
