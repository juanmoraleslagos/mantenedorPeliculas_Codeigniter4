<?php

namespace App\Controllers\Dashboard;

use App\Models\CategoriaModel;
use App\Controllers\BaseController;


class Categoria extends BaseController
{

    public function index()
    {
        // Instanciando Y Ocupando Metodos.
        $categoriaModel = new CategoriaModel();

        // Enviando Datos A La Vista.
        return view('/dashboard/categoria/index', [
            'categorias'  => $categoriaModel->paginate(5),
            'pager'       => $categoriaModel->pager
        ]);
    }

    public function new()
    {
        // Creando Data.
        $data = [
            'categoria' => new CategoriaModel()
        ];

        //Renderizando Vista.
        return view('/dashboard/categoria/new', $data);
    }

    public function create()
    {
        // Creando Instancia.
        $categoriaModel = new CategoriaModel();

        // validando campos formulario.
        if ($this->validate('categorias')) {
            // Creando Data.
            $data = [
                'titulo'      => $this->request->getPost('titulo'),
            ];
            // Insertando Nuevo Registro En Base De Datos.
            $categoriaModel->insert($data);
        } else {
            session()->setFlashdata([
                'validation' => $this->validator
            ]);

            // redirección.
            return redirect()->back()->withInput();
        }

        // redireccionando.
        return redirect()->to('/dashboard/categoria')->with('mensaje', 'Registro Creado De Manera Exitosa');
    }

    public function show($id)
    {
        // Instanciando Y Ocupando Metodos.
        $categoriaModel = new CategoriaModel();
        $categoria = $categoriaModel->find($id);

        //Renderizando Vista.
        return view('/dashboard/categoria/show', [
            'categoria'  => $categoria,
        ]);
    }

    public function delete($id)
    {
        // Instanciando Y Creando Métodos.
        $categoriaModel = new CategoriaModel();
        $categoriaModel->delete($id);

        return redirect()->back()->with('mensaje', 'Registro Borrado De Manera Exitosa');
    }

    public function edit($id)
    {
        // Instanciando Y Ocupando Metodos.
        $categoriaModel = new CategoriaModel();
        $categoria = $categoriaModel->find($id);

        // Enviando Datos A La Vista.
        return view('/dashboard/categoria/edit', [
            'categoria' => $categoria
        ]);
    }

    public function update($id)
    {
        // Instanciando Y Ocupando Métodos.
        $categoriaModel = new CategoriaModel();

        // validando campos formulario.
        if ($this->validate('categorias')) {
            // Creando La Data.
            $data = [
                'titulo'      => $this->request->getPost('titulo'),
            ];
            // Actualizando Datos.
            $categoriaModel->update($id, $data);
        } else {
            session()->setFlashdata([
                'validation' => $this->validator
            ]);

            // redireccionando.
            return redirect()->back()->withInput();
        }

        // redireccionando.
        return redirect()->to('/dashboard/categoria')->with('mensaje', 'Registro Actualizado De Manera Exitosa');
    }
}
