<?php

include('../../db.php');

if(isset($_POST['usuario'])){

        $id=$_POST['id'];
        $usuario=$_POST['usuario'];
        $password=sha1($_POST['password']);
        $correo=$_POST['correo'];

        $editar="UPDATE usuarios SET usuario=?, password=?, correo=? WHERE id=?";
        $sentencia_editar=$conexpdo->prepare($editar);
	    $sentencia_editar->execute(array($usuario,$password,$correo,$id));

        if(!$sentencia_editar){
            echo 0;

        }else{
            echo 1;
        }
        //echo $id.$puesto;
        
}



?>