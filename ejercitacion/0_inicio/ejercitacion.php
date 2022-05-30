<?php
// Ejercicio 1 imprimir continente y pais 
echo '<h1>' . 'Ejercicio 1' . '</h1>';
echo '<h3>' . 'Consigna: imprimir continente y pais ' . '</h3>';
if (isset($_GET['cont']) && isset($_GET['pais'])) {
    $continente = $_GET['cont'];
    $pais = $_GET['pais'];

    echo '<h4>' . var_dump($continente) . '</h4>';
    echo '</br>';
    echo '<h4>' . var_dump($pais) . '</h4>';
} else {
    echo 'Ingrese las variables cont y pais' . '</br>';
}

echo '<hr>';

// Ejercicio 2 imprimir solamente los numeros pares del 1 al 100
echo '<h1>' . 'Ejercicio 2' . '</h1>';
echo '<h3>' . 'Consigna: imprimir solamente los numeros pares del 1 al 100' . '</h3>';
$numero = 1;
while ($numero <= 100) {
    $numero++;
    if ($numero % 2 == 0) {
        echo $numero . ', ';
    }
}

echo '<hr>';

// Ejercicio 3 imprimir el cuadrado de todos los numeros entre el 1 y el 40
echo '<h1>' . 'Ejercicio 3' . '</h1>';
echo '<h3>' . 'Consigna: imprimir el cuadrado de todos los numeros entre el 1 y el 40' . '</h3>';

for ($i = 0; $i <= 40; $i++) {
    echo 'El cuadrado de ' . $i . ' es ' . $i * $i . ' || ';
}

echo '<hr>';

// Ejercicio 4 realizar un calculadora
echo '<h1>' . 'Ejercicio 4' . '</h1>';
echo '<h3>' . 'Consigna: realizar un calculadora basica' . '</h3>';

if (isset($_GET['num1']) && isset($_GET['num2'])) {
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    echo 'suma: ' . ($num1 + $num2) . '</br>';
    echo 'resta: ' . ($num1 - $num2) . '</br>';
    echo 'producto: ' . ($num1 * $num2) . '</br>';
    echo 'division: ' . ($num1 / $num2) . '</br>';
} else {
    echo 'Ingrese las variables num1 y num2' . '</br>';
}

echo '<hr>';

// Ejercicio 5 mostrar todos los numeros entre dos que se ingresan por url
echo '<h1>' . 'Ejercicio 5' . '</h1>';
echo '<h3>' . 'Consigna: mostrar todos los numeros entre dos que se ingresan por url' . '</h3>';

if (isset($_GET['num1']) && isset($_GET['num2'])) {
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];

    if ($num1 < $num2) {
        for ($i = $num1; $i <= $num2; $i++) {
            echo $i . ', ';
        }
    } else if ($num2 < $num1) {
        for ($i = $num2; $i <= $num1; $i++) {
            echo $i . ', ';
        }
    } else {
        echo 'Ingrese numeros diferentes';
    }
} else {
    echo 'Ingrese las variables num1 y num2' . '</br>';
}

echo '<hr>';

// Ejercicio 6 crear tabla de multiplicar del 1 al 10
echo '<h1>' . 'Ejercicio 6' . '</h1>';
echo '<h3>' . 'Consigna: crear tabla de multiplicar del 1 al 10' . '</h3>';

echo '<table border="1"> <tr>';
echo '<td></th>';
for ($cabecera = 1; $cabecera <= 9; $cabecera++) {
    echo '<th>' . $cabecera . '</th>';
}
echo '</tr><tr>';
echo '<td>1x</th>';
for ($columna1 = 1; $columna1 <= 9; $columna1++) {
    echo '<th>' . $columna1 * 1 . '</th>';
}
echo '</tr> <tr>';
echo '<td>2x</th>';
for ($columna1 = 1; $columna1 <= 9; $columna1++) {
    echo '<th>' . $columna1 * 2 . '</th>';
}
echo '</tr> <tr>';
echo '<td>3x</th>';
for ($columna1 = 1; $columna1 <= 9; $columna1++) {
    echo '<th>' . $columna1 * 3 . '</th>';
}
echo '</tr> <tr>';
echo '<td>4x</th>';
for ($columna1 = 1; $columna1 <= 9; $columna1++) {
    echo '<th>' . $columna1 * 4 . '</th>';
}
echo '</tr> <tr>';
echo '<td>5x</th>';
for ($columna1 = 1; $columna1 <= 9; $columna1++) {
    echo '<th>' . $columna1 * 5 . '</th>';
}
echo '</tr> <tr>';
echo '<td>6x</th>';
for ($columna1 = 1; $columna1 <= 9; $columna1++) {
    echo '<th>' . $columna1 * 6 . '</th>';
}
echo '</tr> <tr>';
echo '<td>7x</th>';
for ($columna1 = 1; $columna1 <= 9; $columna1++) {
    echo '<th>' . $columna1 * 7 . '</th>';
}
echo '</tr> <tr>';
echo '<td>8x</th>';
for ($columna1 = 1; $columna1 <= 9; $columna1++) {
    echo '<th>' . $columna1 * 8 . '</th>';
}
echo '</tr> <tr>';
echo '<td>9x</th>';
for ($columna1 = 1; $columna1 <= 9; $columna1++) {
    echo '<th>' . $columna1 * 9 . '</th>';
}
echo '</tr> <tr>';
echo '<td>10x</th>';
for ($columna1 = 1; $columna1 <= 9; $columna1++) {
    echo '<th>' . $columna1 * 10 . '</th>';
}
echo '</tr>';
echo '</table>';


echo '<hr>';

// Ejercicio 7 mostrar numeros impares entre dos numeros
echo '<h1>' . 'Ejercicio 7' . '</h1>';
echo '<h3>' . 'Consigna: mostrar numeros impares entre dos numeros' . '</h3>';

if (isset($_GET['num1']) && isset($_GET['num2'])) {
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];

    if ($num1 < $num2) {
        for ($i = $num1; $i <= $num2; $i++) {
            if ($i % 2 !== 0) {
                echo $i . ', ';
            }
        }
    } else if ($num2 < $num1) {
        for ($i = $num2; $i <= $num1; $i++) {
            if ($i % 2 !== 0) {
                echo $i . ', ';
            }
        }
    } else {
        echo 'Ingrese numeros diferentes';
    }
} else {
    echo 'Ingrese las variables num1 y num2' . '</br>';
}
