<?php
$numeros = [21, 12, 46, 37, 55,];

function mostrarArray($array)
{
    $resultado = '';
    // recorrer array
    foreach ($array as $numero) {
        $resultado .= $numero . ' // ';
    }
    return $resultado;
}
// mostrar array
echo mostrarArray($numeros) . '</br>';
// array ordenado
sort($numeros);
echo mostrarArray($numeros) . '</br>';

echo '</br>';

// longitud de array
echo count($numeros) . '</br>';

echo '</br>';

// buscar elemento
echo 'se encuentra en la pocision ' . array_search(55, $numeros);

echo '</br>';

// comprobar que un arreglo tenga mas de 120 elementos, si no agregarselos
for ($i = count($numeros); $i < 120; $i++) {
    array_push($numeros, rand(0, 100));
}
echo '</br>' . mostrarArray($numeros) . '</br>';

echo '</br>';

// comprobar si una variable esta vacia, si lo esta rellenarl con palabras en minusculas

$texto = '';

if (empty(trim($texto))) {
    $texto = 'Hola mundo';
    echo strtolower($texto);
} else {
    echo strtolower($texto);
}

echo '</br>';

// crear 4 variables con 4 tipo de variables y imprimir un mensaje secul el tipo de variable que sea
$matriz = [1, 3, 4];
$text = 'hola';
$numero = 14;
$boleano = true;

echo '</br>';

switch (gettype($text)) {
    case 'array':
        echo '$matriz es un array </br>';
        break;
    case 'string':
        echo '$text es un string </br>';
        break;
    case 'integer':
        echo '$numero es un int </br>';
        break;
    case 'boolean':
        echo '$boleano es un boolean </br>';
        break;
    default:
        break;
}

echo '</br>';

// tabla echa con array

$array = array(
    'Accion' => ['Fury', 'Fast and Fourius', 'Matrix'],
    'Romance' => ['Notes', 'Remember me', 'La la land'],
    'Historicas' => ['Marco polo', 'Titanic', '300'],
);

echo '</br>';


$categorias = array_keys($array);
?>

<table border="1">
    <tr>
        <?php foreach ($categorias as $categoria) { ?>
            <th><?= $categoria ?></th>
        <?php } ?>
    </tr>
    <tr>
        <td><?php echo $array['Accion'][0] ?></td>
        <td><?php echo $array['Romance'][0] ?></td>
        <td><?php echo $array['Historicas'][0] ?></td>
    </tr>
    <tr>
        <td><?php echo $array['Accion'][1] ?></td>
        <td><?php echo $array['Romance'][1] ?></td>
        <td><?php echo $array['Historicas'][1] ?></td>
    </tr>
    <tr>
        <td><?php echo $array['Accion'][2] ?></td>
        <td><?php echo $array['Romance'][2] ?></td>
        <td><?php echo $array['Historicas'][2] ?></td>
    </tr>
</table>