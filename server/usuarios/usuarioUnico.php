<?php

include('../../db.php');

if(isset($_POST['id'])){

    $id=$_POST['id'];

    $sentencia="SELECT * FROM usuarios WHERE id=$id";
    $consulta=$conexpdo->prepare($sentencia);
    $consulta->execute();

    $json=array();

    while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
        $json[]=array(
            'id'=>$fila['id'],
            'usuario'=>$fila['usuario'],
            'correo'=>$fila['correo'],
            'password'=>$fila['password']
        );
    }

    echo json_encode($json[0]);

}



?>