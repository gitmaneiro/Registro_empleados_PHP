<?php
include('../../db.php');


$sentencia= "SELECT * FROM usuarios";
$consulta= $conexpdo->prepare($sentencia);
$consulta->execute();

$json=array();

while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
    $json[]=array(
        'id'=>$fila['id'],
        'usuario'=>$fila['usuario'],
        'password'=>$fila['password'],
        'correo'=>$fila['correo']
       
    );
}

echo json_encode($json);

?>