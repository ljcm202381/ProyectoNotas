<?php
require_once('../../Conexion.php');

class Usuarios extends Conexion
{
  
	//definir el constructor para llamar a la bd
    public function __construct()
    {
    	$this->db = parent:: __construct();
    }

}

?>