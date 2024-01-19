<?php

include('../../db.php');

if(isset($_POST['nombrepuesto'])){

    $nombrepuesto=$_POST['nombrepuesto'];

    $sentencia= "INSERT INTO puestos (nombrepuesto) VALUES ('$nombrepuesto')";
    $consulta=$conexpdo->prepare($sentencia);
    $consulta->execute();

        if(!$consulta){
            die ('Consulta a fallado');
        }

        echo 1;

}



?>