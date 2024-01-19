<?php

include('../../db.php');


$sentencia= "SELECT * FROM puestos";
$consulta= $conexpdo->prepare($sentencia);
$consulta->execute();

$json=array();

while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
    $json[]=array(
        'id'=>$fila['id'],
        'puesto'=>$fila['nombrepuesto']
       
    );
}

echo json_encode($json);


?>