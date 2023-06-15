<?php
class Conexion
{
	protected $db;
	private $drive = "mysql";
	private $host = "localhost";
	private $dbname = "notas2023";
	private $user= "root";
	private $password= "";

//creando el constructor que realizara la conexion
public function __construct(){
   try{
      $db = new PDO("{$this->drive}:host={$this->host};dbname
      	={$this->dbname}", $this->user,$this->password);

      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "conectado";
      return $db;
   }catch(PDOException $e){
   	echo "Ha surgido un error: Detalle ".$e->getMessage();

   }

}

}

?>