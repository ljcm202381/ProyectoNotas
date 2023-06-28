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
      

<div class="container">
  <h2>EDITAR DOCENTE</h2>
  <?php
require_once('../../Conexion.php');
require_once('../modelos/docentes.php');

$Id = $_GET['Id'];

$doce = new Docentes();
$row = $doce->getiddoc($Id);
if($row){
    ?>
  <form action="../controladores/actualizardocente.php" method="post">
    <input type="hidden" name="Id" value="<?php echo $Id ?>">
    <div class="form-group">
      <label >Nombre:</label>
      <input type="text" class="form-control" placeholder="Ingresar nombre del docente" name="txtnombredoc"  value="<?php echo $row['Nombredo'] ?>"/>
    </div>
    <div class="form-group">
      <label >Apellido:</label>
      <input type="text" class="form-control" placeholder="Ingresar apellido del docente" name="txtapellidodoc"  value="<?php echo $row['Apellidodo'] ?>"/>
    </div>
    <div class="form-group">
      <label >Usuario:</label>
      <input type="text" class="form-control" placeholder="Ingresar usuario docente" name="txtusuariodoc"  value="<?php echo $row['Usuariodoc'] ?>"/>
    </div>
    <div class="form-group">
      <label >CONTRASEÑA:</label>
      <input type="password" class="form-control"  placeholder="Ingresar contraseña" name="txtcontrasenadoc"  value="<?php echo $row['Passworddoc'] ?>"/>
    </div>
    <div class="form-group">
      <label >MATERIA A IMPARTIR :</label>
      <input type="text" class="form-control"  placeholder="Ingresar nombre de la materia a dictar" name="txtmateriadoc"  value="<?php echo $row['Materiado'] ?>"/>
    </div>
    <div class="form-group">
      <p>Perfil: 
              <label for="perfil"></label>
              <select name="txtperfildoc"  value="<?php echo $row['Perfil'] ?>"/>
               <option value="Docente">Docente</option>
              </select>
            </p>
    </div>
    <div class="form-group">
      <p>Estado: 
              <label for="estado"></label>
              <select name="txtestadodoc"  value="<?php echo $row['Estado'] ?>"/>
               <option value="Activo">Activo</option>
                <option value="No activo">No activo</option>
              </select>
            </p>
    </div>

 
    <button type="submit" class="btn btn-primary">REGISTRAR</button>
  </form>
  <?php
  } else {
    echo "No se encontraron resultados.";
} ?>
</div>

</body>
</html>