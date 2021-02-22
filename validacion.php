<?php

$username= $_POST['username'];
$password= $_POST['password'];
$validacion =is_file("Usuarios/$username.txt");
if ($validacion==true){

    $listaArchivos=array();
    $lineas=file_get_contents("Usuarios/$username.txt");
    $listaArchivos[] = explode("\n",$lineas);
    foreach ($listaArchivos as $datos) {
        $usuario = $datos[0];
        $contraseña =$datos[1];
        $correo = $datos[2];
    } 
    switch ($password) {
        case $contraseña:
            session_start();
            ob_start();
              $_SESSION['usuario']=$username;
               header('location:index2.php');
            break;
         default:
         header('location:account2.html');
            break;
    }
    
}
else {
    header('location:account2.html');
}

?>