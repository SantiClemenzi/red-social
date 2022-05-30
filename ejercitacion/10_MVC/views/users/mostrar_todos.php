<h1>Listado de usuario</h1>
<?php while($usuario = $mostrar_todos->fetch_object()) : ?>
    <?= $usuario->nombre.' ' ?>
    <?= $usuario->apellido ?>
    </br>
    <?= $usuario->email?>
    </br>
<?php endwhile ?>