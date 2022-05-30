<?php
require_once '../vendor/autoload.php';

// conexion a db
$conexion = new mysqli('localhost', 'root', '', 'notas_master');
$conexion->query("SET NAMES 'UTF8'");

// consulta a la pagina
$q = $conexion->query('SELECT * FROM notas');

$numero_elementos = $q->num_rows;
$numero_elementos_pagina = 1;

$pagination = new Zebra_Pagination();

// numero total de elementos a paginar
$pagination->records($numero_elementos);

// numero de elementos paginados
$pagination->records_per_page($numero_elementos_pagina);

$page = $pagination->get_page();

$empieza_aca = (($page - 1) * $numero_elementos_pagina);
$sql = "SELECT * FROM notas LIMIT  $empieza_aca, $numero_elementos_pagina";

$notas = $conexion->query($sql);

echo   '<link rel="stylesheet" href="../vendor/stefangabos/zebra_pagination/examples/example1.php/public/css/zebra_pagination.css" type="text/css">';

while ($nota = $notas->fetch_object()) {
    echo '<h1>' . $nota->titulo . '</h1>';
    echo '<h3>' . $nota->descripcion . '</h3>';
}
echo '</link>';
// generamos la paginacion
$pagination->render();
