<?php

// capturar exepciones en un codigo susceptible a errores
try{

    if(isset($_GET['id'])){
        echo '<h1> El parametro es: '.$_GET['id'] .' </h1>';
    }else{
        throw new Exception('Errores de logica');
    }
}
catch(Exception $e){
    echo 'Ah ocurrido un error '. $e->getMessage();
}
finally{
    echo 'Sentencia finalizada';
}