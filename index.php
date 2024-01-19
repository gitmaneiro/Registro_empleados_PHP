<?php 
session_start();

$_SECCIONES="secciones/";


if($_SESSION['usuario']!=''){

  $secciones=$_SECCIONES."bienvenida.php"; 

  if(isset($_GET["q"])){
    $secciones=$_SECCIONES.$_GET["q"].".php";
  }
  
  include("plantilla.html");

}

if(!isset($_SESSION['usuario'])){

  header('location:login.php');
}


?>

