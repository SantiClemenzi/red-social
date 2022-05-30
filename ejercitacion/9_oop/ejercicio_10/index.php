<?php
// incluimos todas las clases que vayamos a usar
require_once 'autoload.php';

// $user = new Usuario();
// echo $user->nombre;
// echo '</br>';
// echo $user->email;

// namespaces y paquetes

class Principal
{
    public $Usuario;
    public $Categoria;
    public $Entrada;

    public function __construct()
    {
        $this->Usuario = new MyClasses\Usuario();
        $this->Categoria = new MyClasses\Categoria();
        $this->Entrada = new MyClasses\Entrada();
    }
}

$principal = new Principal();

var_dump($principal->Usuario);


$class = class_exists('MyClasses\Categoria');
if ($class) {
    echo '<h1>La clase existe</h1>';
} else {
    echo '<h1>La clase NO existe</h1>';
}
