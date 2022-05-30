<?php

if (isset($_COOKIE['miCookie'])) {
    echo '<h1>' . $_COOKIE['miCookie'] . '</h1>';
    echo '</br>';
} 
else {
    echo 'No existe la cookie';
}


if (isset($_COOKIE['oneYear'])) {
    echo '<h1>' . $_COOKIE['oneYear'] . '</h1>';
    echo '</br>';
} else {
    echo 'No existe la cookie';
}

?>

<a href="eliminar_cookies.php">eliminar cookie</a>