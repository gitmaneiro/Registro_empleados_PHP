<?php

include('../../db.php');

if(isset($_POST['usuario'])){

    $usuario=$_POST['usuario'];
    $correo=$_POST['correo'];
    $password=sha1($_POST['password']);

    $sentencia= "INSERT INTO usuarios (usuario, password , correo ) VALUES ('$usuario', '$password' , '$correo')";
    $consulta=$conexpdo->prepare($sentencia);
    $consulta->execute();

        if(!$consulta){
            die ('Consulta a fallado');
        }

        echo 1;

}

?>