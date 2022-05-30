<?php

// iniciamos sesion
session_start();

// variable local
$var = 'Hola mundo';

// variable global
$_SESSION['var_persistente'] = 'soy una sesion activa';

// imprimimos variables
echo $var . '</br>';
echo $_SESSION['var_persistente'] . '</br>';
