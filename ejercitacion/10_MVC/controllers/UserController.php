<?php
// el controlador se separa en acciones
class UserController{
    public function showAll(){
        require_once 'models/User.php';

        $user = new User();
        $mostrar_todos=$user->getAll('usuarios');

        require_once 'views/users/mostrar_todos.php';
    }

    public function crear(){
        require_once 'views/users/crear.php';
    }
}