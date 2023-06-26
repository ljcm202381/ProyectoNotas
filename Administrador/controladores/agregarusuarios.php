<?php
require_once('../../Conexion.php');
require_once('../modelos/administrador.php');
if($_POST)
{
	$admin = new Administrador();
	$Nombreusu= $_POST['txtnombre'];
	$Apellidousu=$_POST['txtapellido'];
	$Usuariousu=$_POST['txtusuario'];
	$Passwordusu=$_POST['txtcontrasena'];
	$Perfil=$_POST['txtperfil'];
	$Estadousu=$_POST['txtestado'];


$admin->addadmi($Nombreusu,$Apellidousu,$Usuariousu,$Passwordusu,$Perfil,$Estadousu);
if($admin){
  	print "<script>alert(\"Usuario registrado\");
		window.location='../pages/index.php';</script>";
  }else {
  	print "<script>alert(\"No se puede registrar el usuario.\");
		window.location='../pages/agregar.php';</script>";
  }

}


?>