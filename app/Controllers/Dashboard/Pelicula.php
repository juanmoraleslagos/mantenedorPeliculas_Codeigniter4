<?php

namespace App\Controllers\Dashboard;

use App\Models\ImagenModel;
use App\Models\EtiquetaModel;
use App\Models\PeliculaModel;
use App\Models\CategoriaModel;
use App\Controllers\BaseController;
use App\Database\Migrations\PeliculaEtiquetas;
use App\Models\PeliculaEtiquetaModel;
use App\Models\PeliculaImagenModel;

class Pelicula extends BaseController
{

    public function show($id)
    {
        // Instanciando Y Ocupando Metodos.
        $peliculaModel = new PeliculaModel();
        $pelicula  = $peliculaModel->find($id);
        $imagenes  = $peliculaModel->getImagesById($id);
        $etiquetas = $peliculaModel->getEtiquetasById($id);

        //Renderizando Vista.
        return view('/dashboard/pelicula/show', [
            'pelicula'  => $pelicula,
            'imagenes'  => $imagenes,
            'etiquetas' => $etiquetas
        ]);
    }

    public function new()
    {
        // instanciando categorias.
        $categoriaModel = new CategoriaModel();

        // Creando Data.
        $data = [
            'pelicula'   => new PeliculaModel(),
            'categorias' => $categoriaModel->find()
        ];

        //Renderizando Vista.
        return view('/dashboard/pelicula/new', $data);
    }

    public function create()
    {
        // Creando Instancia.
        $peliculaModel = new PeliculaModel();

        // validando campos formulario.
        if ($this->validate('peliculas')) {
            // Creando Data.
            $data = [
                'titulo'       => $this->request->getPost('titulo'),
                'descripcion'  => $this->request->getPost('descripcion'),
                'categoria_id' => $this->request->getPost('categoria_id'),
            ];
            // Insertando Nuevo Registro En Base De Datos.
            $peliculaModel->insert($data);
        } else {
            session()->setFlashdata([
                'validation' => $this->validator
            ]);

            // redireccionando.
            return redirect()->back()->withInput();
        }

        // redireccionando.
        return redirect()->to('/dashboard/pelicula')->with('mensaje', 'Registro Creado De Manera Exitosa');
    }

    public function edit($id)
    {
        // Instanciando.
        $peliculaModel  = new PeliculaModel();
        $categoriaModel = new CategoriaModel();

        // ocupando métodos.
        $pelicula   = $peliculaModel->find($id);
        $categorias = $categoriaModel->find();

        // Enviando Datos A La Vista.
        return view(
            '/dashboard/pelicula/edit',
            [
                'pelicula'   => $pelicula,
                'categorias' => $categorias
            ]
        );
    }

    public function update($id)
    {
        // Instanciando Y Ocupando Métodos.
        $peliculaModel = new PeliculaModel();

        // validando campos formulario.        
        if ($this->validate('peliculas')) {
            // Creando La Data.
            $data = [
                'titulo'       => $this->request->getPost('titulo'),
                'descripcion'  => $this->request->getPost('descripcion'),
                'categoria_id' => $this->request->getPost('categoria_id')
            ];
            // Actualizando Datos.
            $peliculaModel->update($id, $data);
        } else {
            session()->setFlashdata([
                'validation' => $this->validator
            ]);

            // redireccionando.
            return redirect()->back()->withInput();
        }

        return redirect()->back()->with('mensaje', 'Registro Actualizado De Manera Exitosa');
    }

    public function delete($id)
    {
        // Instanciando Y Creando Métodos.
        $peliculaModel = new PeliculaModel();
        $peliculaModel->delete($id);

        return redirect()->back()->with('mensaje', 'Registro Borrado De Manera Exitosa');
    }

    public function index()
    {
        // instanciando.
        $peliculaModel = new PeliculaModel();

        // Creando data.
        $data = [
            'peliculas' => $peliculaModel->select('peliculas.*, categorias.titulo as categoria')->join('categorias', 'categorias.id = peliculas.categoria_id')->find(),
        ];

        // Enviando Datos A La Vista.
        return view('/dashboard/pelicula/index', $data);
    }

    public function etiquetas($id)
    {
        // creando instancias.
        $categoriaModel = new CategoriaModel();
        $etiquetaModel  = new EtiquetaModel();
        $peliculaModel  = new PeliculaModel();

        $etiquetas = [];

        if ($this->request->getGet('categoria_id')) {
            $etiquetas = $etiquetaModel
                ->where('categoria_id', $this->request->getGet('categoria_id'))
                ->findAll();
        }

        // creando data.
        $data = [
            'pelicula'     => $peliculaModel->find($id),
            'categorias'   => $categoriaModel->findAll(),
            'categoria_id' => $this->request->getGet('categoria_id'),
            'etiquetas'    => $etiquetas
        ];

        // retornando vita.
        return view('dashboard/pelicula/etiquetas', $data);
    }

    public function etiquetas_post($id)
    {
        // instanciando.
        $peliculaEtiquetaModel = new PeliculaEtiquetaModel();

        // creando variables.
        $etiquetaId = $this->request->getPost('etiqueta_id');
        $peliculaId = $id;

        // utilizando métodos.
        $peliculaEtiqueta = $peliculaEtiquetaModel->where('etiqueta_id', $etiquetaId)->where('pelicula_id', $peliculaId)->first();

        // validando campos formulario.        
        if ($this->validate('etiquetas')) {
            // creando data.
            $data = [
                'pelicula_id' => $peliculaId,
                'etiqueta_id' => $etiquetaId
            ];

            // guardando datos.
            if (!$peliculaEtiqueta) {
                $peliculaEtiquetaModel->insert($data);
            }

            return redirect()->back();
        } else {
            session()->setFlashdata([
                'validation' => $this->validator
            ]);

            // redireccionando.
            return redirect()->back()->withInput();
        }
    }

    public function etiqueta_delete($id, $etiquetaId)
    {

        // instanciando.
        $peliculaEtiqueta = new PeliculaEtiquetaModel();

        // creando query.
        $peliculaEtiqueta->where('etiqueta_id', $etiquetaId)
            ->where('pelicula_id', $id)
            ->delete();

        // redireccionando.
        return redirect()->back()->with('mensaje','Etiqueta Eliminada');
    }

    private function generar_imagen()
    {
        $imagenModel = new ImagenModel();

        $data = [
            'imagen'    => date('Y-m-d H:m:s'),
            'extension' => 'Pendiente',
            'data'      => 'Pendiente'
        ];

        $imagenModel->insert($data);
    }
    private function asignar_imagen()
    {
        $peliculaImagenModel = new PeliculaImagenModel();

        $data = [
            'imagen_id'   => 1,
            'pelicula_id' => 43
        ];

        $peliculaImagenModel->insert($data);
    }
}
