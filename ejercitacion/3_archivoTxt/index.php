<?php

// abrimos archivo
$archivo = fopen('fichero.txt', 'a+');

// leer el contenido
while (!feof($archivo)) {
    $contenido = fgets($archivo);
    echo $contenido . '</br>';
}

// escribimos en el archivo
// fwrite($archivo, '**Soy el texto agregado**');

// copiamos el archivo
// copy('ficher.txt', 'fichero.txt' or die('error al copiar'));

// cambiar nombre
// rename('fichero.txt', 'ficheroCopiado.txt');
// rename('ficher.txt', 'fichero.txt');

// cerramos archivo
fclose($archivo);
