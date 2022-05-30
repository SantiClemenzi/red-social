<?php
// creamos clase
class Usuario{
    public $nombre;
    public $email;

    public function __construct()
    {
        echo 'Objedo creado';
    }
    public function __destruct()
    {
        echo 'Objeto destruido';
    }
}

$user = new Usuario;

