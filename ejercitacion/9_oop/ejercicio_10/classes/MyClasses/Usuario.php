<?php
namespace MyClasses;

class Usuario{
    public $nombre;
    public $email;

    public function __construct()
    {
        $this -> nombre = 'santiago clemenzi';
        $this -> email = 'santiago@mail.com';
    }
}