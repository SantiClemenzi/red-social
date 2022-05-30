<?php
$archivo = $_FILES['archivo'];
$nombre = $archivo['name'];
$tipo = $archivo['type'];
// var_dump($archivo);

if($tipo=='image/jpg'||$tipo=='image/png'||$tipo=='image/jpeg'||$tipo=='image/gif'){
    if(!is_dir('images')){
        mkdir('images', 0777);
    }
    move_uploaded_file($archivo['tmp_name'],'images/'.$nombre);
    echo '<h2>El archivo se a subido correctamente.</h2>';
    header('Refresh:4; URL=index.php');
}else{
    header('Refresh:4; URL=index.php');
    echo '<h2>Error. Ingrese un archivo valido....</h2>';
}

die();
