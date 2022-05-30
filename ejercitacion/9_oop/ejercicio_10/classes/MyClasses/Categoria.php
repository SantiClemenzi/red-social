<?php
namespace MyClasses;

class Categoria{
    public $nombre;
    public $descripcion;

    public function __construct()
    {
        $this -> nombre = 'Accion';
        $this -> descripcion = 'Esta es la descripcion de la categoria de accion.';
    }
}