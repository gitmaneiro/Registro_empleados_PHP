<?php

include('../db.php');

if(isset($_GET['id'])){

    $id=$_GET['id'];

    $sentencia="SELECT * FROM empleados WHERE id=$id";
    $consulta=$conexpdo->prepare($sentencia);
    $consulta->execute();
    $fila=$consulta->fetch(PDO::FETCH_ASSOC);

            $id=$fila['id'];
            $p_nombre=$fila['p_nombre'];
            $s_nombre=$fila['s_nombre'];
            $p_apellido=$fila['p_apellido'];
            $s_apellido=$fila['s_apellido'];
            $foto=$fila['foto'];
            $cv=$fila['cv'];
            $id_puesto=$fila['id_puesto'];
            $fecha=$fila['fechaingreso'];
   // print_r($fila);

  $nombre_completo=$p_nombre." ".$s_nombre." ".$p_apellido." ".$s_apellido;

   $fecha_inicio= new DateTime($fecha);
   $fecha_fin= new DateTime(date('y-m-d'));
   $tiempo_trabajo=date_diff($fecha_inicio,$fecha_fin);

}
ob_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carta de Recomendación</title>
  </head>
  <body>
    <h1>Carta de Recomendación Laboral</h1>
    <br/><br/>
    Maturín/Monagas, Venezuela a <strong>fecha</strong>
    <br/><br/>
    A quien pueda interesar:
    <br/><br/>
    Reciba un cordial y respetuoso saludo.
    <br/></br>
    A traves de estas lineas deseo hacer conocimiento de que Sr(a) <strong> <?php echo $nombre_completo; ?></strong>
    quie laboro en mi organización durante <strong><?php echo $tiempo_trabajo->y; ?> años</strong>
    es un ciudadano con una conducta intachable. Ha demostrado ser un gran trabajador, comprometisdo,
    responsable y fiel cumplidor de sus tareas.
    Siempre a mostrado preocupación por mejorar, capacitarse y actualizar sus conocimientos.
</br></br>
Durante estos años se desempeñado como: <strong><?php echo $id_puesto; ?></strong>
Sin mas nada a que referirme y esperando que esta misiva sea tomada en cuenta, dejo mi numero de contacto.
</br></br></br></br></br></br></br></br>
Atentamente
</br></br>
Ing Fernando Maneiro.
  </body>
</html>

<?php
$HTML=ob_get_clean();
require_once('../librerias/dompdf/autoload.inc.php');

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$opciones = $dompdf->getOptions();

$opciones->set(array("isRemoteEnabled"=>true));

$dompdf->setOptions($opciones);

$dompdf->loadHTML($HTML);

$dompdf->setPaper('letter');

$dompdf->render();

$dompdf->stream("archivo.pdf", array("Attachment"=>false));

?>