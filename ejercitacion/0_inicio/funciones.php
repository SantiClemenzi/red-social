<?php
// funciones variables
function buenosDias()
{
    return 'Hola, espero que tengas un buen dia';
}
function buenasNoches()
{
    return 'Hola, espero hayas tenido un buen dia, espero que descanses';
}

$var = 'buenosDias';

echo $var() . '</br>';


// funciones predefinidas basicas

// fechas
echo '</br>' . date('D-M-Y') . '</br>';
echo time().'</br>';

// matematicas
echo '</br> Raiz cuadrada: ' . sqrt(10);
echo '</br> Numero aleatorio entre 10 y 90: ' . rand(10, 90);
echo '</br> Numero pi: ' . pi();
echo '</br> Numero redondeado: ' . round(8.569).'</br>';

// detectar tipos de variables
if(is_int(5)){
    echo '</br> SI es un entero';
}else{
    echo '</br> NO es un entero';
}

// limpiar espacios de un string
$texto = '</br>  hola Mundo  ';

 var_dump(trim($texto));

//  eliminar variables
$year = 2019;
echo '</br>'.$year;
unset($year);
// echo '</br>'.$year;

// comprobar si una variable esta vacia
// empty() o empty(trim())
echo '</br>';
// convertir string a lowerCase o UpperCase

$texto = 'Hola';

echo '</br>'.strtoupper($texto);
echo '</br>'.strtolower($texto);

