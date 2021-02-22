<?php

$username= $_POST['username'];
$password= $_POST['password'];
$email= $_POST['email'];

$baseUsuarios = fopen("Usuarios/$username.txt",'a+');
fwrite($baseUsuarios,$username."\n");
fwrite($baseUsuarios,$password."\n");
fwrite($baseUsuarios,$email."\n");
fclose($baseUsuarios);

header('location:registro.html');

?>