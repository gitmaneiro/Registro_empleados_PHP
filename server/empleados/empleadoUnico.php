<?php

include('../../db.php');

if(isset($_POST['id'])){

    $id=$_POST['id'];

    $sentencia="SELECT * FROM empleados WHERE id=$id";
    $consulta=$conexpdo->prepare($sentencia);
    $consulta->execute();


   $json=array();
    while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
        $json[]=array(
            'id'=>$fila['id'],
            'p_nombre'=>$fila['p_nombre'],
            's_nombre'=>$fila['s_nombre'],
            'p_apellido'=>$fila['p_apellido'],
            's_apellido'=>$fila['s_apellido'],
            'foto'=>$fila['foto'],
            'cv'=>$fila['cv'],
            'id_puesto'=>$fila['id_puesto'],
            'fecha'=>$fila['fechaingreso']
        );
    }

 echo json_encode($json[0]);

}


?>