<?php
error_reporting(0);
//variables dinamicas para los valores
$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fecha = $_POST['fecha'];

//fecha para sql aaaa/mm/dd
/*
$f = explode('/', $fecha);
$fecha_sql = $f[2].$f[0].$f[1];
*/
//variables para la conexion
$link = mysqli_connect('localhost','root','','phpintermedio');
$sql = "INSERT INTO turnero VALUES ($dni, '$nombre', '$apellido', '$fecha')";

//chekeo de la conexion con la BD
if($link == TRUE){
    echo '+SE CONECTO CON LA BD+';
}
else{
    echo '+NO SE CONECTO CON LA BD+';
}

//se realiza la consulta
mysqli_query($link, $sql);

//cierre de la conexion con la BD
mysqli_close($link);

//redireccion al turnero
header('Location: index.php');
?>