<?php
require_once('../../Conexion.php');
require_once('../modelos/administrador.php');
if($_POST)
{
	$admin = new Administrador();
	$Nombreusu= $_POST['txtnombre'];
	$Apellidousu=$_POST['txtapellido'];
	$Usuariousu=$_POST['txtusuario'];
	$Passwordusu=MD5($_POST['txtcontrasena']);
	$Perfil=$_POST['txtperfil'];
	$Estadousu=$_POST['txtestado'];


$admin->addadmi($Nombreusu,$Apellidousu,$Usuariousu,$Passwordusu,$Perfil,$Estadousu);
if($admin){
  	print "<script>alert(\"Medico registrado\");
		window.location='../view/Principal.php';</script>";
  }else {
  	print "<script>alert(\"Fallo al ingresar los datos.\");
		window.location='../index.php';</script>";
  }

}


?>