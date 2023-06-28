<?php
class Materias extends Conexion
{
public function __construct(){

 	$this->db=parent::__construct();
 }


//funcion para registrar los usuarios
public function addmate($Nombremate)
{
   //verificar de que no exista un usuario en la bd 
   $sql1 = "SELECT * FROM Materias WHERE Nombremate = '$Nombremate'";
    $Resultado=$this->db->query($sql1);
   if ($Resultado->rowCount() > 0) {
           
        
      echo "<script>
          alert('La materia ya existe');
          window.location = '../pages/agregar.php';
      </script>";   
    }else
    {
   //crear la sentencia sql
   $statement = $this->db->prepare("INSERT INTO materias(Nombremate)values(:Nombremate)");

   $statement->bindParam(':Nombremate',$Nombremate);
    if($statement->execute())
   {
     
     print "<script>alert(\"Materia registrada\");
		window.location='../pages/index.php';</script>";
   }else
   {
      print "<script>alert(\"No se puede registrar la materia.\");
		window.location='../pages/agregar.php';</script>";

   }

}
}




//funcion para consultar el usuario de acuerdo a su id
public function getidmate()
{
  
    //$row=null;
 $sql = "SELECT * FROM materias ORDER BY Nombremate ";
        $result = $this->db->query($sql); 
        if ($result->rowCount() > 0) {
            while($row = $result->fetch()) {
                $resultset[] = $row;
            }
        }
        return $resultset;
        
    }

  

//funcion actualizar los datos del usuario
public function updatemate($Id,$Nombremate)
{
	$statement=$this->db->prepare("UPDATE materias SET id_Materia=:Id,Nombremate=:Nombremate WHERE id_Materia=$Id");
	$statement->bindParam(':Id',$Id);
	$statement->bindParam(':Nombremate',$Nombremate);
   
   if($statement->execute())
   {
   	 echo "<script>
          alert('materia actualizada');
          window.location = '../pages/index.php';
      </script>";  

   }else 
   {
   	 echo "<script>
          alert('materia no actualizada');
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



?>