<?php

include('../../db.php');

if(isset($_POST['puesto'])){

        $id=$_POST['id'];
        $puesto=$_POST['puesto'];

        $editar="UPDATE puestos SET nombrepuesto=? WHERE id=?";
        $sentencia_editar=$conexpdo->prepare($editar);
	    $sentencia_editar->execute(array($puesto,$id));

        if(!$sentencia_editar){
            echo 0;

        }else{
            echo 1;
        }
        //echo $id.$puesto;
        
}




?>