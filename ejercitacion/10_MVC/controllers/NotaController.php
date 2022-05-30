<?php
class NotaController{
    public function listar (){
        // modelo
        require_once 'models/nota.php';
        $nota = new Nota();

        // accion del controlador
        $nota->setNombre('TITULO EN NOTA');
        $nota->setContenido('HOLA MUNDO PHP MVC');

        $notas = $nota->getAll('notas');

        // vista
        require_once('views/nota/listar.php');
    }
    public function crear (){

    }
    public function borrar (){

    }
}