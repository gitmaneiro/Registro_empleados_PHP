<?php

$servidor="localhost";
$baseDeDatos="empleados_php";
$usuario="root";
$contrasena="";

    try {
        
        $conexpdo= new PDO("mysql:host=$servidor;dbname=$baseDeDatos", $usuario, $contrasena );

    } catch (PDOException $e) {

        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }

   // if($conexpdo){
    ///    echo "conectado a la base de datos....";
   //// }

?>