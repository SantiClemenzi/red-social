<?php

// cookie basica
setcookie('miCookie', 'valor de la cookie');

// cookie con caducidad
setcookie('oneYear', 'cookie que dura un año', time()+(60*60*24*365));

// cookie 

?>

<a href="ver_cookies.php">ver mis cookies</a>