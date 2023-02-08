<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class Categoria extends ResourceController
{
    protected $modelName = 'App\Models\CategoriaModel';
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
        if ($this->validate('categorias')) {
            // Creando Data.
            $data = [
                'titulo'      => $this->request->getPost('titulo'),
            ];
            // Insertando Nuevo Registro En Base De Datos.
            $id = $this->model->insert($data);
        } else {

            // obteniendo errores particulares.
            if ($this->validator->getError('titulo')) {
                return $this->respond($this->validator->getError('titulo'), 400);
            }
        }
        // redireccionando.
        return $this->respond($id);
    }

    public function update($id = null)
    {
        if ($this->validate('categorias')) {
            // creando la data.
            $data = [
                'titulo'      => $this->request->getRawInput()['titulo'],
            ];
            // Actualizando Datos.
            $this->model->update($id, $data);
        } else {

            // obteniendo errores particulares.
            if ($this->validator->getError('titulo')) {
                return $this->respond($this->validator->getError('titulo'), 400);
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
