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
        <a class="nav-link" href="../pages/agregar.php">Usuarios</a>
    </li>
  <ul class="navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="index.php">Docentes</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="../../Estudiantes/pages/agregar.php">Estudiantes</a>
    </li>
     <li class="nav-item">
        <a class="nav-link" href="../../Materias/pages/agregar.php">Materias</a>
    </li>
     <li class="nav-item">
       <a href="cerrar_sesion.php"><button class="btn btn-danger col col align-self-end"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cerrar Sesion</button></a>
            
    </li>
  
        
  
     </ul>
</nav>
 
        <br>
      
<h2>BIENVENIDO:<?php echo $_SESSION['NOMBRE'];?></h2>
<div class="container">
  <h2>REGISTRO DE DOCENTES </h2>
  <form action="../controladores/agregardocente.php" method="post">
    <div class="form-group">
      <label >Nombre:</label>
      <input type="text" class="form-control" placeholder="Ingresar nombre del docente" name="txtnombredoc">
    </div>
    <div class="form-group">
      <label >Apellido:</label>
      <input type="text" class="form-control" placeholder="Ingresar apellido del docente" name="txtapellidodoc">
    </div>
    <div class="form-group">
      <label >Usuario:</label>
      <input type="text" class="form-control" placeholder="Ingresar usuario docente" name="txtusuariodoc">
    </div>
    <div class="form-group">
      <label >CONTRASEÑA:</label>
      <input type="password" class="form-control"  placeholder="Ingresar contraseña" name="txtcontrasenadoc">
    </div>
    <div class="form-group">
      <label >MATERIA A IMPARTIR :</label>
      <input type="text" class="form-control"  placeholder="Ingresar nombre de la materia a dictar" name="txtmateriadoc">
    </div>
    <div class="form-group">
      <p>Perfil: 
              <label for="perfil"></label>
              <select name="txtperfildoc">
               <option value="Docente">Docente</option>
              </select>
            </p>
    </div>
    <div class="form-group">
      <p>Estado: 
              <label for="estado"></label>
              <select name="txtestadodoc">
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