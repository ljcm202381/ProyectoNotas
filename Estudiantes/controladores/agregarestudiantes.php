<?php
require_once('../../Conexion.php');
require_once('../modelos/estudiantes.php');
if($_POST)
{
	$estu = new Estudiantes();
	$id = $_POST['Id'];
	$Nombreusu= $_POST['txtnombreest'];
	$Apellidousu=$_POST['txtapellidoest'];
	$Usuariousu=$_POST['txtusuario'];
	$Passwordusu=MD5($_POST['txtcontrasena']);
	$Perfil=$_POST['txtperfil'];
	$Estadousu=$_POST['txtestado'];


$admin->updatead($id,$Nombreusu,$Apellidousu,$Usuariousu,$Passwordusu,$Perfil,$Estadousu);
if($admin){
  	print "<script>alert(\"Medico registrado\");
		window.location='../view/Principal.php';</script>";
  }else {
  	print "<script>alert(\"Fallo al ingresar los datos.\");
		window.location='../index.php';</script>";
  }

}


?>