<?php
require_once('../modelos/administrador.php');
require_once('../../Usuarios/modelos/login.php');
$musuario = new Administrador();
$Id = $_GET['Id'];
error_reporting(0);
$model = new Usuario();
$model->validarSesion();
if(!$_SESSION["validar"]){
    print "<script>alert(\"es para usuarios registrados.\");window.location='../../index.php';</script>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Eliminar</title>
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
	   
        <!-- Grey with black text -->
<nav nav class="navbar navbar-expand-sm bg-dark navbar-dark"">
   <a class="navbar-brand" href="#">
    <img src="../../img/colegio.png" alt="Logo" style="width:40px;">
  </a>
   <ul class="navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="">Usuarios</a>
    </li>
  <ul class="navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="">Docentes</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="">Estudiantes</a>
    </li>
     <li class="nav-item">
        <a class="nav-link" href="">Materias</a>
    </li>
     <li class="nav-item">
       <a href="cerrar_sesion.php"><button class="btn btn-danger col col align-self-end"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cerrar Sesion</button></a>
            
    </li>
  
        
  
     </ul>
</nav>
 
        <br>
      
<h3>Eliminar usuario</h3>
<form method="POST" action="../controladores/eliminarusuarios.php">
    <label for="id">ID del usuario:</label>
    <input type="text" name="Id" id="Id">
    <button type="submit" class="btn btn-success">Eliminar </button>
</form>
</body>
</html>