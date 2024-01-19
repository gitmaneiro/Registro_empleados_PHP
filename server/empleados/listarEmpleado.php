<?php

include('../../db.php');


$sentencia= "SELECT *,(SELECT nombrepuesto FROM puestos WHERE puestos.id=empleados.id_puesto limit 1) as puesto FROM empleados";
$consulta= $conexpdo->prepare($sentencia);
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
        'puesto'=>$fila['puesto'],
        'fecha'=>$fila['fechaingreso']
    );
}

echo json_encode($json);


?>