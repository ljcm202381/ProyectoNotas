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
        <a class="nav-link" href="../../Docentes/pages/agregar.php">Docentes</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="../../Estudiantes/pages/agregar.php">Estudiantes</a>
    </li>
     <li class="nav-item">
        <a class="nav-link" href="../../Materias/pages/index.php">Materias</a>
    </li>
     
    <li class="nav-item">
      <a href="agregar.php"><button class="btn btn-danger col col align-self-end"><span class="glyphicon glyphicon-remove" aria-hidden="true" name="salir"></span> Crear usuario</button></a></li>

      <li class="nav-item">
       <a href="../../Usuarios/controladores/salir.php"><button class="btn btn-danger col col align-self-end"><span class="glyphicon glyphicon-remove" aria-hidden="true" type="submit" name="salir"></span> Cerrar Sesion</button></a>
            
    </li>
     </ul>
</nav>
 
        <br>
        
               <br>
        <h2>BIENVENIDO:<?php echo $_SESSION['NOMBRE'];?></h2>
        <h1>Lista de usuarios</h1>

        <div class="container">
      <div class="container">

        <div col-auto-mt-5>

        <table class="table table-dark table-hover">
            <tr>
                <th>ID USUARIO</th>
                <th>NOMBRE</th>
                <th>Apellido</th>
                <th>Usuario</th>
                <th>Perfil</th>
                <th>Estado</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>

            <tbody>
                <?php
                require_once('../../Conexion.php');
                require_once('../modelos/administrador.php');

                 $obj = new Administrador();
                 $datos = $obj->getadmin();

                 foreach($datos as $key){

                ?>

                <tr>
                    <td><?php echo $key['id_usuario']?></td>
                    <td><?php echo $key['Nombreusu']?></td>
                    <td><?php echo $key['Apellidousu']?></td>
                    <td><?php echo $key['Usuario']?></td>
                    <td><?php echo $key['Perfil']?></td>
                    <td><?php echo $key['Estado']?></td>
    <td><a href="editar.php?Id=<?php echo $key['id_usuario']?>" class="btn btn-danger">Actualizar</a></td>
    <td><a href="eliminar.php?=<?php echo $key['id_usuario']?>"class="btn btn-primary">Eliminar</a></td>
                </tr>

         <?php } ?>
            </tbody>

        </table>
          
      </div>

      </div>
               
    </body>
</html>