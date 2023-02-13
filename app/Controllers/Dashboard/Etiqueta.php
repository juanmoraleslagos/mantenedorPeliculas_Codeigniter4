<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\EtiquetaModel;
use App\Models\CategoriaModel;


class Etiqueta extends BaseController
{

    public function show($id)
    {
        // Instanciando Y Ocupando Metodos.
        $etiquetaModel = new EtiquetaModel();

        // creando variable.
        $etiqueta  = $etiquetaModel->find($id);

        //Renderizando Vista.
        return view('/dashboard/etiqueta/show', [
            'etiqueta'  => $etiqueta,
        ]);
    }

    public function new()
    {
        // instanciando categorias.
        $categoriaModel = new CategoriaModel();

        // Creando Data.
        $data = [
            'etiqueta'   => new EtiquetaModel(),
            'categorias' => $categoriaModel->find()
        ];

        //Renderizando Vista.
        return view('/dashboard/etiqueta/new', $data);
    }

    public function create()
    {
        // Creando Instancia.
        $etiquetaModel = new EtiquetaModel();

        // validando campos formulario.
        if ($this->validate('etiquetas')) {
            // Creando Data.
            $data = [
                'titulo'       => $this->request->getPost('titulo'),
                'categoria_id' => $this->request->getPost('categoria_id'),
            ];
            // Insertando Nuevo Registro En Base De Datos.
            $etiquetaModel->insert($data);
        } else {
            session()->setFlashdata([
                'validation' => $this->validator
            ]);

            // redireccionando.
            return redirect()->back()->withInput();
        }

        // redireccionando.
        return redirect()->to('/dashboard/etiqueta')->with('mensaje', 'Registro Creado De Manera Correcta');
    }

    public function edit($id)
    {
        // Instanciando.
        $etiquetaModel  = new EtiquetaModel();
        $categoriaModel = new CategoriaModel();

        // ocupando métodos.
        $etiqueta   = $etiquetaModel->find($id);
        $categorias = $categoriaModel->find();

        // Enviando Datos A La Vista.
        return view(
            '/dashboard/etiqueta/edit',
            [
                'etiqueta'   => $etiqueta,
                'categorias' => $categorias
            ]
        );
    }

    public function update($id)
    {
        // Instanciando Y Ocupando Métodos.
        $etiquetaModel = new EtiquetaModel();

        // validando campos formulario.        
        if ($this->validate('etiquetas')) {
            // Creando La Data.
            $data = [
                'titulo'       => $this->request->getPost('titulo'),
                'categoria_id' => $this->request->getPost('categoria_id')
            ];
            // Actualizando Datos.
            $etiquetaModel->update($id, $data);
        } else {
            session()->setFlashdata([
                'validation' => $this->validator
            ]);

            // redireccionando.
            return redirect()->back()->withInput();
        }

        return redirect()->back()->with('mensaje', 'Registro Actualizado De Manera Correcta');
    }

    public function delete($id)
    {
        // Instanciando Y Creando Métodos.
        $etiquetaModel = new EtiquetaModel();
        $etiquetaModel->delete($id);

        return redirect()->back()->with('mensaje', 'Registro Borrado De Manera Exitosa');
    }

    public function index()
    {
        // instanciando.
        $etiquetaModel = new EtiquetaModel();

        // Creando data.
        $data = [
            'etiquetas' => $etiquetaModel->select('etiquetas.*, categorias.titulo as categoria')->join('categorias', 'categorias.id = etiquetas.categoria_id')
                ->paginate(5),
            'pager' => $etiquetaModel->pager
        ];

        // Enviando Datos A La Vista.
        return view('/dashboard/etiqueta/index', $data);
    }
}
