<?php
require_once('../../Conexion.php');
session_start();
class Usuario extends Conexion
{
  
	//definir el constructor para llamar a la bd
    public function __construct()
    {
    	$this->db = parent:: __construct();
    }

    public function login($usuario,$passwords)
    {
     $statement = $this->db->prepare("SELECT id_usuario,Usuario,Password,Perfil,Estado FROM usuarios WHERE Usuario=:usuario AND Password:=paswords");

   $statement->bindParam(':usuario',$usuario);
   $statement->bindParam(':passwords',$passwords);
   $statement->execute();
   if ($statement->rowCount() == 1) {
       $_SESSION['NOMBRE'] = $statement['Nombreusu']." ".statement['Apellidousu'];
       $_SESSION['id_usuario'] = $statement['id_usuario'];
       $_SESSION['Perfil']= $statement['Perfil'];
       return true;
               
            }
        return false;
     }

     public function getNombre(){
       return $_SESSION['NOMBRE']; 
     }
     public function getid(){
        return $_SESSION['id_usuario'];
     }
     public function getperfil(){
       return $_SESSION['Perfil']; 
     }

     public function validarsesion(){
        if($_SESSION['id_usuario']==null){
            header('Location: ../../index.php');
        }
    }

     public function validaradmin(){
        if($_SESSION['id_usuario'] != null)
        {
            if($_SESSION['Perfil']=='Administrador'){
                header('Location:../../Estudiantes/pages/index.php');
            }else{
                header('Location:../../index.php');
            }
        }
     }   
     }


?>