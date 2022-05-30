<?php
require_once 'ModeloBase.php';

class User extends ModeloBase
{
    public $nombre;
    public $apellido;
    public $email;
    public $password;

    public function __construct()
    {
        parent::__construct();
    }
    // mostrar objeto
    function getNombre()
    {
        return $this->nombre;
    }
    function getApellido()
    {
        return $this->apellido;
    }
    function getEmail()
    {
        return $this->email;
    }
    function getPassword()
    {
        return $this->password;
    }
    // establecer objeto
    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }
    function setEmail($email)
    {
        $this->email = $email;
    }
    function setPassword($password)
    {
        $this->password = $password;
    }
}
