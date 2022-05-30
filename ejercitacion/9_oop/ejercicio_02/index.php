<?php
require_once 'constructor.php';

$auto = new Auto('Fiat', 'Palio', 120, 'Gris');
$auto1 = new Auto('VW', 'GOL', 130, 'ROJO');

echo $auto->getVelocidad();
echo '</br>';
// var_dump($auto);

echo $auto->getInfo(1);
