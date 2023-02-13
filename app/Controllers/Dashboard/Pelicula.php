<?php

namespace App\Controllers\Dashboard;

use App\Models\ImagenModel;
use App\Models\EtiquetaModel;
use App\Models\PeliculaModel;
use App\Models\CategoriaModel;
use App\Controllers\BaseController;
use App\Models\PeliculaImagenModel;
use App\Models\PeliculaEtiquetaModel;
use App\Database\Migrations\PeliculaEtiquetas;
use CodeIgniter\Exceptions\PageNotFoundException;

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

            // llamando funcion de imagen.
            $this->asignar_imagen($id);
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
        return redirect()->back()->with('mensaje', 'Etiqueta Eliminada');
    }

    public function descargar_imagen($imagenId)
    {
        $imagenModel = new ImagenModel();

        $imagen = $imagenModel->find($imagenId);

        if ($imagen == null) {
            return 'No Exite Imagen';
        }

        $imagenRuta = 'uploads/peliculas/' . $imagen->imagen;

        return $this->response->download($imagenRuta, null)->setFileName('imagen.png');
    }

    public function borrar_imagen($imagenId)
    {
        $imagenModel         = new ImagenModel();
        $peliculaImagenModel = new PeliculaImagenModel();

        // buscando imagen.
        $imagen = $imagenModel->find($imagenId);
        // borrar archivo.
        if ($imagen == null) {
            return 'No Exite Imagen';
        }
        // eliminando imagen.
        $imagenRuta = 'uploads/peliculas/' . $imagen->imagen;
        unlink($imagenRuta);

        // eliminando imagen desde tabla pivote.
        $peliculaImagenModel->where('imagen_id', $imagenId)->delete();
        // eliminando imagen desde tabla imagen.
        $imagenModel->delete($imagenId);

        return redirect()->back()->with('mensaje', 'Imagen Eliminada');
    }


    private function asignar_imagen($peliculaId)
    {
        // verificando existencia de una imagen.
        $imagefile = $this->request->getFile('imagen');

        if ($imagefile) {
            // realizando proceso de upload.
            if ($imagefile->isValid()) {

                // verificar que archivo sea imagen.
                $validated = $this->validate([
                    'uploaded[imagen]',
                    'mime_in[imagen,image/jpg,image/gif,image/png]',
                    'max_size[imagen,4096]'
                ]);

                // verificando cumplimiento de validaciones.
                if ($validated) {
                    $imageNombre = $imagefile->getRandomName();
                    $extension   = $imagefile->guessExtension();

                    $imagefile->move('../public/uploads/peliculas', $imageNombre);

                    // guardando imagen en BD-> imagen.
                    $imagenModel = new ImagenModel();
                    $data = [
                        'imagen'    => $imageNombre,
                        'extension' => $extension,
                        'data'      => 'Pendiente'
                    ];
                    $imagenId = $imagenModel->insert($data);

                    // insertando en BD-> peliculaImagen - tabla pivote.
                    $peliculaImagenModel = new PeliculaImagenModel();

                    // creando data.
                    $dataPeliculaImagen = [
                        'imagen_id'   => $imagenId,
                        'pelicula_id' => $peliculaId
                    ];

                    $peliculaImagenModel->insert($dataPeliculaImagen);
                }

                return $this->validator->listErrors();
            }
        }
    }

    function image($image)
    {
        // abre el archivo en modo binario.
        if (!$image) {
            $image = $this->request->getGet('image');
        }

        $name = WRITEPATH . 'uploads/peliculas/' . $image;

        if (!file_exists($name)) {
            throw PageNotFoundException::forPageNotFound();
        }

        $fp = fopen($name, 'rb');

        // envía las cabeceras corretas.
        header("Content-Type: image/png");
        header("Content-Length: " . filesize($name));

        // vuelca la imagen y detiene el script.
        fpassthru($fp);
        exit;
    }
}
