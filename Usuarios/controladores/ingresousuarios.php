<?php

require_once('../../Conexion.php');
require_once('../modelos/login.php');
if($_POST)
{
  $Usuariousu = $_POST['txtusuario'];
  $Passwordusu = $_POST['txtcontrasena'];

  $modelo = new Usuario();
 
   if($modelo->login($Usuariousu,$Passwordusu))
   {
      header('Location:../../Administrador/pages/index.php');
   }
   else{
      header('Location:../../index.php');
   }
}else{
  header('Location:../../index.php');
}


?>