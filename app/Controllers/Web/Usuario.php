<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class Usuario extends BaseController
{
    public function login()
    {
        return view('web/usuario/login');
    }

    public function login_post()
    {
        // instanciando usuario.
        $usuarioModel = new UsuarioModel();

        // validando formulario login.
        if ($this->validate('login')) {

            // verificando si existe usuario.
            $email      = $this->request->getPost('email'); // Email O Usuario
            $contrasena = $this->request->getPost('contrasena'); // Password

            $usuario = $usuarioModel->select('id,usuario,email,contrasena,tipo')
                ->orWhere('email', $email)
                ->orWhere('usuario', $email)
                ->first();

            if (!$usuario) {
                return redirect()->back()->with('mensaje', 'Usuario Y/O Contraseña Inválida');
            }

            // Comprobar credenciales.
            if ($usuarioModel->contrasenaVerificar($contrasena, $usuario->contrasena)) {
                unset($usuario->contrasena);
                session()->set('usuario', $usuario);

                return redirect()->to('/dashboard/categoria')->with('mensaje', "Bienvenid@ $usuario->usuario");
            }

            // redireccionando.
            return redirect()->back()->with('mensaje', 'Usuario Y/O Contraseña Inválida');
        }

        session()->setFlashdata([
            'validation' => $this->validator
        ]);

        return redirect()->back()->withInput();
    }


    public function register()
    {
        return view('web/usuario/register');
    }

    public function register_post()
    {
        // instanciando usuario.
        $usuarioModel = new UsuarioModel();


        if ($this->validate('usuarios')) {
            // creando data.
            $data = [
                'usuario'      => $this->request->getPost('usuario'),
                'email'        => $this->request->getPost('email'),
                'contrasena'   => $usuarioModel->contrasenaHash($this->request->getPost('contrasena')),
            ];

            // insertando usuarios.
            $usuarioModel->insert($data);

            // redireccionando.
            return redirect()->to(route_to('usuario.login'))->with('mensaje', "Usuario Registrado Con Éxito");
        }

        session()->setFlashdata([
            'validation' => $this->validator
        ]);

        return redirect()->back()->withInput();
    }

    public function logout()
    {
        // destruyendo sesion.
        session()->destroy();

        //redireccionando.
        return redirect()->to(route_to('usuario.login'));
    }
}
