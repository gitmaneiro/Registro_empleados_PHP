<?php

include('../../db.php');

if($_POST){

    $pnombre=$_POST['primernombre'];
    $snombre=$_POST['segundonombre'];
    $papellido=$_POST['primerapellido'];
    $sapellido=$_POST['segundoapellido'];
    $foto=$_FILES['foto']['name'];
    $t_foto=$_FILES['imagen']['size'];
    $tp_foto=$_FILES['imagen']['type'];
    $cv=$_FILES['cv']['name'];
    $tipo_cv=$_FILES['cv']['type'];
    $tamano_cv=$_FILES['cv']['size'];
    $idpuesto=$_POST['selectagregaempleado'];
    $fechaingreso=$_POST['fechadeingreso'];
    
    $fecha_=new DateTime();

    $nombreFoto=$fecha_->getTimestamp()."_".$_FILES['foto']['name'];

   if($t_foto<=1000000 || $tp_foto=='image/jpg' || $tp_foto=='image/jpeg' || $tp_foto=='image/png'){
        $carpeta_destino='../../serverImg/';
        move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta_destino.$nombreFoto);
    }else{
        echo 0;
    }

    $nombreArchivo=$fecha_->getTimestamp()."_".$_FILES['cv']['name'];

    if((strpos($nombreArchivo, 'pdf') || strpos($nombreArchivo, 'doc'))==true){
        $carpeta_destino='../../servercv/';
        move_uploaded_file($_FILES['cv']['tmp_name'], $carpeta_destino.$nombreArchivo);


    }else{
        echo 0;
    }

    
    $sentencia= "INSERT INTO empleados (p_nombre, s_nombre , p_apellido, s_apellido, foto, cv, id_puesto, fechaingreso) 
                VALUES ('$pnombre', '$snombre' , '$papellido', '$sapellido', '$nombreFoto', '$nombreArchivo', '$idpuesto', '$fechaingreso')";
    $consulta=$conexpdo->prepare($sentencia);
    $consulta->execute();

        if(!$consulta){
            die ('Consulta a fallado');
        }else{
            echo 1;
        }
  

}


?>