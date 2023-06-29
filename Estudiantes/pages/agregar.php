<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registro Estudiantes</title>
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
      

<div class="container">
  <h2>REGISTRO DE ESTUDIANTES </h2>

  <?php
  require_once('../../Conexion.php');
  require_once('../../metodos.php');
   
   $me = new Metodo();

  ?>
  <form action="../controladores/agregarestudiantes.php" method="post">
    <div class="form-group">
      <label >Nombre:</label>
      <input type="text" class="form-control" placeholder="Ingresar nombre del estudiante" name="txtnombreest">
    </div>
    <div class="form-group">
      <label >Apellido:</label>
      <input type="text" class="form-control" placeholder="Ingresar apellido del estudiante" name="txtapellidoest">
    </div>
     <div class="form-group">
      <label >Documento:</label>
      <input type="text" class="form-control" placeholder="Ingresar documento del estudiante" name="txtdocumento">
    </div>
     <div class="form-group">
      <label >Correo:</label>
      <input type="text" class="form-control" placeholder="Ingresar correo del estudiante" name="txtcorreoest">
    </div>
    <div class="form-group">
      <label >Seleccionar Materia:</label>
     <select name="txtmateriaestu" class="form-control input-lg ">
                   <option>Seleccionar</option>
                     <?php
                     $mate=$me->getmaterias();
                     if($mate != null)
                     {
                      foreach($mate as $ma){
                        ?>
                        <option value="<?php echo $ma['Nombremate'];?>"><?php echo $ma['Nombremate'];?></option>
                        <?php
                      }
                     }
                     ?>
                      
                </select>         
    </div>
    <div class="form-group">
      <label >Seleccionar Docente:</label>
     <select name="txtmateriaestu" class="form-control input-lg ">
                   <option>Seleccionar</option>
                     <?php
                     $mate=$me->getdocentes();
                     if($mate != null)
                     {
                      foreach($mate as $ma){
                        ?>
                        <option value="<?php echo $ma['Nombredo'];?>"><?php echo $ma['Nombredo'];?></option>
                        <?php
                      }
                     }
                     ?>
                      
                </select>         
    </div>
    
    <div class="form-group">
      <label >Notal final materia :</label>
      <input type="number" class="form-control"  placeholder="Ingresar nota final de la materia" name="txtnota">
    </div>
    
    <div class="form-group">
       <label >Fecha Registro :</label>
      <input type="date" class="form-control"  name="txtfecha">
    </div>

 
    <button type="submit" class="btn btn-primary">REGISTRAR</button>
  </form>
</div>

</body>
</html>