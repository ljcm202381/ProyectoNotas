<!DOCTYPE html>


<html>
    <head>
        <meta charset="utf-8">
        <title>Gestion</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <title></title>
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
 <body>
       <div class="container">
  <h2>Actualizar datos </h2>
  <?php
require_once('../../Conexion.php');
require_once('../modelos/administrador.php');

$Id = $_GET['Id'];

$admin = new Administrador();
$row = $admin->getidad($Id);
if($row){
    ?>
  <form action="../controladores/actualizarusuario.php" method="post">
    <input type="hidden" name="Id" value="<?php echo $Id ?>">
    <div class="form-group">
      <label >Nombre:</label>
      <input type="text" class="form-control" placeholder="Ingresar su nombre" name="txtnombre" value="<?php echo $row['Nombreusu'] ?>"/>
    </div>
    <div class="form-group">
      <label >Apellido:</label>
      <input type="text" class="form-control" placeholder="Ingresar su apellido" name="txtapellido" value="<?php echo $row['Apellidousu']?>"/>
    </div>
    <div class="form-group">
      <label >Usuario:</label>
      <input type="text" class="form-control" placeholder="Ingresar su usuario" name="txtusuario" value="<?php echo $row['Usuario']?>"/>
    </div>
    <div class="form-group">
      <label >CONTRASEÑA:</label>
      <input type="password" class="form-control"  placeholder="Ingresar contraseña" name="txtcontrasena" value="<?php echo $row['Password']?>"/>
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
                  <option value=</option>
                <option value="Activo">Activo</option>
                <option value="No activo">No activo</option>
              </select>
            </p>
    </div>

 
    <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
  </form>
  <?php
  } else {
    echo "No se encontraron resultados.";
}
?>
</div>
</body>
</html>
