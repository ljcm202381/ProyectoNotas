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
   
    <li class="nav-item">
        <a class="nav-link" href="../../Estudiantes/pages/agregar.php">Estudiantes</a>
    </li>
     <li class="nav-item">
        <a class="nav-link" href="../../Materias/pages/agregar.php">Materias</a>
    </li>
      <li class="nav-item">
       <a href="../../Usuarios/controladores/salir.php"><button class="btn btn-danger col col align-self-end"><span class="glyphicon glyphicon-remove" aria-hidden="true" type="submit" name="salir"></span> Cerrar Sesion</button></a>
            
    </li>
  
        
  
     </ul>
</nav>
 
        <br>
      <h2>BIENVENIDO:<?php echo $_SESSION['NOMBRE'];?></h2>
        <div class="container">
 <h1 style="color:blue;text-align:center;">LISTADO DE DOCENTES</h1>
          
  <div class="content" style="text-align:center;">
   <div class="justify-content-center">
    <div class="col-auto mt-5">
  <table class="table table-dark table-hover">
      <tr>
       
       <th width="20%">id usuario</th>  
       <th width="20%">Nombre</th>  
       <th width="20%">Apellido</th>  
       <th width="20%">Usuario</th>
       <th width="20%">Materia</th>
       <th width="20%">Perfil</th>
       <th width="20%">Estado</th>      
       <th width="10%">Editar</th>  
       <th width="10%">Eliminar</th>  
      
      </tr>
            <tbody>


  <?php
 require_once('../../Conexion.php');
require_once('../modelos/docentes.php');
  $obj = new Docentes();
  $datos = $obj->getdoc();


  foreach ($datos as $key){
      
                ?>
                
                    <tr>
                        <td><?php echo $key["id_docente"] ?></td>
                        <td><?php echo $key["Nombredo"] ?></td>
                        <td><?php echo $key["Apellidodo"] ?></td>
                        <td><?php echo $key["Usuariodoc"] ?></td>
                        <td><?php echo $key["Materiado"] ?></td>
                        <td><?php echo $key["Perfil"] ?></td>
                        <td><?php echo $key["Estado"] ?></td>
                       <td> <a href="editar.php?Id=<?php echo $key['id_docente']?>" class="btn btn-success">Actualizar</a>

                       </td>
                        
                        <td>
                         <td> <a href="eliminar.php?Id=<?php echo $key['id_docente']?>" class="btn btn-success">Eliminar</a>

                       </td>
                        
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    
        </div>
        </div>
        </div>

       
    </body>
</html>