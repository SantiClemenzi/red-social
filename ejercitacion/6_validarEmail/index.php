<?php
function validarEmail($email){
    $estado =  '';
    // validaciond del email
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){ 
        $estado = 'Exito. email validado';
    }else{
        $estado = 'Error. email no validado';
    }
    return $estado;
}

if(isset($_GET['email'])){
    echo validarEmail($_GET['email']);
}
else{
    echo 'Envia la variable "email" por GET'; 
}
