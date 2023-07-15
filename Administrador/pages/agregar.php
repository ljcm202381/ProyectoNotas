<?php
require_once('../../Usuarios/modelos/login.php');
error_reporting(0);
$model = new Usuario();
$model->validarSesion();
if(!$_SESSION["validar"]){
    print "<script>alert(\"es para usuarios registrados.\");window.location='../../index.php';</script>";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registro</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    
        <!-- Grey with black text -->
<nav nav class="navbar navbar-expand-sm bg-dark navbar-dark"">
   <a class="navbar-brand" href="#">
    <img src="../../img/colegio.png" alt="Logo" style="width:40px;">
  </a>
   <ul class="navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="../pages/index.php">Usuarios</a>
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
      
<h2>BIENVENIDO:<?php echo $_SESSION['NOMBRE'];?></h2>
<div class="container">
  <h2>REGISTRO DE USUARIOS </h2>
  <form action="../controladores/agregarusuarios.php" method="post">
    <div class="form-group">
      <label >Nombre:</label>
      <input type="text" class="form-control" placeholder="Ingresar su nombre" name="txtnombre">
    </div>
    <div class="form-group">
      <label >Apellido:</label>
      <input type="text" class="form-control" placeholder="Ingresar su apellido" name="txtapellido">
    </div>
    <div class="form-group">
      <label >Usuario:</label>
      <input type="text" class="form-control" placeholder="Ingresar su usuario" name="txtusuario">
    </div>
    <div class="form-group">
      <label >CONTRASEÑA:</label>
      <input type="password" class="form-control"  placeholder="Ingresar contraseña" name="txtcontrasena">
    </div>
    <div class="form-group">
      <p>Perfil: 
              <label for="perfil"></label>
              <select name="txtperfil">
                <option value="Administrador">Administrador</option>
                <option value="Docentes">Docentes</option>
              </select>
            </p>
    </div>
    <div class="form-group">
      <p>Estado: 
              <label for="perfil"></label>
              <select name="txtestado">
               <option value="Activo">Activo</option>
                <option value="No activo">No activo</option>
              </select>
            </p>
    </div>

 
    <button type="submit" class="btn btn-primary">REGISTRAR</button>
  </form>
</div>

</body>
</html>