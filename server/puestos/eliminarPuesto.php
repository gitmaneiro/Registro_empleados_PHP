<?php

include('../../db.php');

    if(isset($_POST['id'])){
        
        $id=$_POST['id'];

        $sentencia="DELETE FROM puestos WHERE id=$id";
        $consulta=$conexpdo->prepare($sentencia);
        $consulta->execute();

        if(!$consulta){
            echo 0;
        }else{
            echo 1;
        }


    }

?>