<?php
// iniciamos sesion
session_start();

if (!isset($_SESSION['numero'])) {
    $_SESSION['numero'] = 0;
}

echo '<h1>' . 'ESTADO DEL CONTADOR: ' . $_SESSION['numero'] . '</h1>';

if (isset($_GET['counter']) && $_GET['counter'] == '1') {
    $_SESSION['numero']++;
} else if (isset($_GET['counter']) && $_GET['counter'] == '0') {
    $_SESSION['numero']--;
}

?>
<p>Seleccione una opcion.</p>
<a href="index.php?counter=1">INCREMENTAR</a><br />
<a href="index.php?counter=0">DECREMENTAR</a><br />