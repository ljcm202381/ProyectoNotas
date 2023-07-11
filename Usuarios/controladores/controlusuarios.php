<?php
	if($_POST["txtusuario"]=="Johanna" && $_POST["txtcontrasena"]=="12345"){
		//inicio la sesión
		session_start();
		
		//Declaro mis variables de sesión
		$_SESSION["autentificado"] = true;
		$_SESSION["usuario"] = $_POST["txtusuario"];
		$_SESSION["start"]= time();
		$_SESSION["expire"] = $_SESSION['start'] + (1*60);
				
		header("Location: ../../Administrador/pages/index.php");
	}else{
		print "<script>alert(\"validar datos de ingresos.\");
		window.location='../../index.php';</script>";
	}
?>