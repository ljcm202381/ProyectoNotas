<?php
require_once('../../Conexion.php');
require_once('../modelos/materias.php');
if($_POST)
{
	$mate = new Materias();
	$Nombremate= $_POST['txtnombremate'];
	


$mate->addmate($Nombremate);
if($mate){
  	print "<script>alert(\"Materia registrada\");
		window.location='Materias/pages/index.php';</script>";
  }else {
  	print "<script>alert(\"No se puede registrar la materia.\");
		window.location='../pages/agregar.php';</script>";
  }

}


?>