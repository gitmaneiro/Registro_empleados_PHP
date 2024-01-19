<?php

include('../../db.php');

    if(isset($_POST['id'])){
        
        $id=$_POST['id'];

        $query="SELECT foto, cv FROM empleados WHERE id=$id";
        $result=$conexpdo->prepare($query);
        $result->execute();
        $registro_recuperado=$result->fetch(PDO::FETCH_LAZY);


        if(isset($registro_recuperado['foto']) && $registro_recuperado['foto']!=''){
            if(file_exists('../../serverImg/'.$registro_recuperado['foto'])){
                    unlink('../../serverImg/'.$registro_recuperado['foto']); 
            }
        }
          
        if(isset($registro_recuperado['cv']) && $registro_recuperado['cv']!=''){
            if(file_exists('../../servercv/'.$registro_recuperado['cv'])){
                    unlink('../../servercv/'.$registro_recuperado['cv']);
            }
        }


        $sentencia="DELETE FROM empleados WHERE id=$id";
        $consulta=$conexpdo->prepare($sentencia);
        $consulta->execute();

        if(!$consulta){
            echo 0;
        }else{
            echo 1;
        }


    }


?>