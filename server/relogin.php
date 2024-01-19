<?php

include('../db.php');

if($_POST){

    $correo=htmlentities($_POST['correo']);
    $password=htmlentities($_POST['password']);

    $sentencia="SELECT * FROM usuarios WHERE correo=:correo AND password=:password";
    $consulta=$conexpdo->prepare($sentencia);
    $consulta->bindValue(':correo', $correo);
    $consulta->bindValue(':password', $password);
    $consulta->execute();

    $numero_registro=$consulta->rowCount();

    if($numero_registro!=0){
        session_start();
        $_SESSION['usuario']=$_POST['correo'];
    }

   echo $numero_registro;
}

?>