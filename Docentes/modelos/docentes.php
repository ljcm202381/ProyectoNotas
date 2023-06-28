<?php
include_once('../../Conexion.php');
class Docentes extends Conexion
{
public function __construct(){

 	$this->db=parent::__construct();
 }

//funcion para registrar los usuarios
 public function addadoc($Nombredoc,$Apellidodoc,$Usuariodoc,$Passworddoc,$Materiadoc,$Perfildoc,$Estadodoc)
{
//verificar de que no exista un usuario en la bd 
   $sql1 = "SELECT * FROM docentes WHERE Usuariodoc = '$Usuariodoc'";
    $Resultado=$this->db->query($sql1);
   if ($Resultado->rowCount() > 0) {
           
        
      echo "<script>
          alert('El docente ya existe');
          window.location = '../../Docentes/pages/agregar.php';
      </script>";   
    }else
    {
  
  //crear la sentencia sql
   $statement = $this->db->prepare("INSERT INTO docentes(Nombredo,Apellidodo,Usuariodoc,Passworddoc,Materiado,Perfil,Estado)values(:Nombredoc,:Apellidodoc,:Usuariodoc,:Passworddoc,:Materiadoc,:Perfildoc,:Estadodoc)"); 	
  
 $statement->bindParam(':Nombredoc',$Nombredoc);
 $statement->bindParam(':Apellidodoc',$Apellidodoc);
 $statement->bindParam(':Usuariodoc',$Usuariodoc);
 $statement->bindParam(':Passworddoc',$Passworddoc);
 $statement->bindParam(':Materiadoc',$Materiadoc);
 $statement->bindParam(':Perfildoc',$Perfildoc);
 $statement->bindParam(':Estadodoc',$Estadodoc);
 if($statement->execute()){


   print "<script>alert(\"Docente registrado\");
		window.location='../../Docentes/pages/index.php';</script>";
   }else
   {
      print "<script>alert(\"No se puede registrar el usuario.\");
		window.location='Docentes/pages/agregar.php';</script>";

   }

}
}



//funcion para consultar todos los usuarios administradores

public function getdoc()
{
 //$row=null;
 $sql = "SELECT * FROM docentes WHERE Perfil='Docente'";
        $result = $this->db->query($sql); 
        if ($result->rowCount() > 0) {
            while($row = $result->fetch()) {
                $resultset[] = $row;
            }
        }
        return $resultset;

}

//funcion para consultar el usuario de acuerdo a su id
public function getiddoc($Id)
{
  
   $statement = $this->db->prepare("SELECT * FROM docentes WHERE id_docente = :Id");
            $statement->bindParam(':Id', $Id);
            $statement->execute();
            
            // Obtener los resultados utilizando fetch()
            $resultado = $statement->fetch(PDO::FETCH_ASSOC);
            
            // Devolver los resultados
            return $resultado;
        
    }

  

//funcion actualizar los datos del usuario
public function updatedoce($Id,$Nombredoc,$Apellidodoc,$Usuariodoc,$Passwordusu,$Materiadoc,$Perfildoc,$Estadodoc)
{
	$statement=$this->db->prepare("UPDATE docentes SET id_docente=:Id,Nombredo=:Nombredoc, Apellidodo=:Apellidodoc, Usuariodoc=:Usuariodoc, Passworddoc=:Passworddoc,Perfil=:Perfildoc, Estado=:Estadodoc WHERE id_docente=$Id");
	$statement->bindParam(':Id',$Id);
	  
 $statement->bindParam(':Nombredoc',$Nombredoc);
 $statement->bindParam(':Apellidodoc',$Apellidodoc);
 $statement->bindParam(':Usuariodoc',$Usuariodoc);
 $statement->bindParam(':Passworddoc',$Passworddoc);
 $statement->bindParam(':Materiadoc',$Materiadoc);
 $statement->bindParam(':Perfildoc',$Perfildoc);
 $statement->bindParam(':Estadodoc',$Estadodoc);
   if($statement->execute())
   {
   	 echo "<script>
          alert('usuario actualizado');
          window.location = '../pages/index.php';
      </script>";  

   }else 
   {
   	 echo "<script>
          alert('usuario no actualizado');
          window.location = '../pages/editar.php';
      </script>";  
   	
   } 

}

	//funcion para eliminar los usuarios
	public function deleteusu($Id)
	{
    
	try {
            $consulta = $this->db->prepare("DELETE FROM usuarios WHERE id_usuario = :Id");
            $consulta->bindParam(':Id', $Id);
            $resultado = $consulta->execute();
            
            // Devolver el resultado de la operación de eliminación
            return $resultado;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }


	
}

?>