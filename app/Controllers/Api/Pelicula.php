<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class Pelicula extends ResourceController
{
    protected $modelName = 'App\Models\PeliculaModel';
    protected $format    = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function show($id = null)
    {
        return $this->respond($this->model->find($id));
    }

    public function create()
    {
        if ($this->validate('peliculas')) {
            // Creando Data.
            $data = [
                'titulo'      => $this->request->getPost('titulo'),
                'descripcion' => $this->request->getPost('descripcion'),
            ];
            // Insertando Nuevo Registro En Base De Datos.
            $id = $this->model->insert($data);
        } else {

            // obteniendo errores particulares.
            if ($this->validator->getError('titulo')) {
                return $this->respond($this->validator->getError('titulo'), 400);
            }
            if ($this->validator->getError('descripcion')) {
                return $this->respond($this->validator->getError('descripcion'), 400);
            }
        }
        // redireccionando.
        return $this->respond($id);
    }

    public function update($id = null)
    {
        if ($this->validate('peliculas')) {
            // creando la data.
            $data = [
                'titulo'      => $this->request->getRawInput()['titulo'],
                'descripcion' => $this->request->getRawInput()['descripcion'],
            ];
            // Actualizando Datos.
            $this->model->update($id, $data);
        } else {

            // obteniendo errores particulares.
            if ($this->validator->getError('titulo')) {
                return $this->respond($this->validator->getError('titulo'), 400);
            }
            if ($this->validator->getError('descripcion')) {
                return $this->respond($this->validator->getError('descripcion'), 400);
            }
        }
        // redireccionando.
        return $this->respond($id);
    }

    public function delete($id = null)
    {
        $this->model->delete($id);
        return $this->respond('Ok');
    }

}
