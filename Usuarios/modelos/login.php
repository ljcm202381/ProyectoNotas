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

    public function login($Usuario,$Password)
    {
    $statement = $this->db->prepare("SELECT * FROM usuarios WHERE Usuario=:Usuario AND Password=:Password");
   $statement->bindParam(':Usuario',$Usuario);
   $statement->bindParam(':Password',$Password);
   $statement->execute();
   if ($statement->rowCount() == 1) {
         $result= $statement->fetch();
       $_SESSION['NOMBRE'] = $result['Nombreusu']." ".$result['Apellidousu'];
       $_SESSION['id_usuario'] = $result['id_usuario'];
       $_SESSION['Perfil']= $result['Perfil'];
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
                header('Location:../../Administrador/pages/index.php');
            }else{
                header('Location:../../index.php');
            }
        }
     }   
     }


?>