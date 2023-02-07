<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table            = 'usuarios';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['usuario', 'email', 'contrasena'];

    // hashear contrasena.
    public function contrasenaHash($contrasenaHash)
    {
        return password_hash($contrasenaHash, PASSWORD_BCRYPT);
    }

    // verificar contraseña.
    public function contrasenaVerificar($contrasenaPlano, $contrasenaHash)
    {

        return password_verify($contrasenaPlano, $contrasenaHash);
    }
}
