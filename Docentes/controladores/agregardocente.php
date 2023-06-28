<?php
require_once('../../Conexion.php');
require_once('../modelos/docentes.php');
if($_POST)
{
	$doc = new Docentes();
	$Nombredoc= $_POST['txtnombredoc'];
	$Apellidodoc=$_POST['txtapellidodoc'];
	$Usuariodoc=$_POST['txtusuariodoc'];
	$Passworddoc=$_POST['txtcontrasenadoc'];
	$Materiadoc=$_POST['txtmateriadoc'];
	$Perfildoc=$_POST['txtperfildoc'];
	$Estadodoc=$_POST['txtestadodoc'];


$doc->addadoc($Nombredoc,$Apellidodoc,$Usuariodoc,$Passworddoc,$Materiadoc,$Perfildoc,$Estadodoc);
if($doc){
  	print "<script>alert(\"Docente registrado\");
		window.location='Docentes/pages/index.php';</script>";
  }else {
  	print "<script>alert(\"No se puede registrar el usuario.\");
		window.location='../pages/agregar.php';</script>";
  }

}


?>