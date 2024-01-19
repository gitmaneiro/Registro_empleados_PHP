<?php

include('../../db.php');


if($_POST){

   $id=$_POST['id-edit-empleado'];

   $pnombre=$_POST['primernombreu'];
   $snombre=$_POST['segundonombreu'];
   $papellido=$_POST['primerapellidou'];
   $sapellido=$_POST['segundoapellidou'];
   $foto=(isset($_FILES['fotou']['name'])?$_FILES['fotou']['name']:'');
   //$t_foto=$_FILES['imagen']['size'];
   //$tp_foto=$_FILES['imagen']['type'];
   $cv=(isset($_FILES['cvu']['name'])?$_FILES['cvu']['name']:'');
   //$tipo_cv=$_FILES['cv']['type'];
   //$tamano_cv=$_FILES['cv']['size'];
   $idpuesto=$_POST['selectagregaempleadou'];
   $fechaingreso=$_POST['fechadeingresou'];

   $editar="UPDATE empleados SET p_nombre=?, s_nombre=?, p_apellido=?, s_apellido=?, id_puesto=?, fechaingreso=? WHERE id=?";
   $sentencia_editar=$conexpdo->prepare($editar);
   $sentencia_editar->execute(array($pnombre,$snombre,$papellido,$sapellido,$idpuesto,$fechaingreso,$id));

    if(!$sentencia_editar){
        echo 0;
     }
   
   $fecha_=new DateTime();

   if($foto!=''){
        $nombreFoto=$fecha_->getTimestamp()."_".$_FILES['fotou']['name'];

        $query="SELECT foto FROM empleados WHERE id=$id";
        $result=$conexpdo->prepare($query);
        $result->execute();
        $registro_recuperado=$result->fetch(PDO::FETCH_LAZY);

        if(isset($registro_recuperado['foto']) && $registro_recuperado['foto']!=''){
            if(file_exists('../../serverImg/'.$registro_recuperado['foto'])){
                    unlink('../../serverImg/'.$registro_recuperado['foto']); 
                }
        }


    $carpeta_destino='../../serverImg/';
    move_uploaded_file($_FILES['fotou']['tmp_name'], $carpeta_destino.$nombreFoto);

    $sentenciafoto="UPDATE empleados SET foto=? WHERE id=?";
    $consultafoto=$conexpdo->prepare($sentenciafoto);
    $consultafoto->execute(array($nombreFoto,$id));

    echo 1;
   }
 

   if($cv!=''){
    $nombreArchivo=$fecha_->getTimestamp()."_".$_FILES['cvu']['name'];

    $query="SELECT cv FROM empleados WHERE id=$id";
    $result=$conexpdo->prepare($query);
    $result->execute();
    $registro_recuperado=$result->fetch(PDO::FETCH_LAZY);

    if(isset($registro_recuperado['cv']) && $registro_recuperado['cv']!=''){
        if(file_exists('../../servercv/'.$registro_recuperado['cv'])){
                unlink('../../servercv/'.$registro_recuperado['cv']); 
            }
    }


    $carpeta_destino='../../servercv/';
    move_uploaded_file($_FILES['cvu']['tmp_name'], $carpeta_destino.$nombreArchivo);

    $sentenciacv="UPDATE empleados SET cv=? WHERE id=?";
    $consultacv=$conexpdo->prepare($sentenciacv);
    $consultacv->execute(array($nombreArchivo,$id));

    echo 1;

    }



}


?>