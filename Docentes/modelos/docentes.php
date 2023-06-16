<?php
include_once('../../Conexion.php');
class Docentes extends Conexion
{

	public function __construct()
	{
		$this->db = parent::__construct();
	}

	//funcion para registrar docentes

	public function adddoc($Nombreusu,$Apellidousu,$Usuarioad,$Passwordad)
	{
		

	}

	//funcion para listar todos los docentes

	public function getdoc()
	{
		$

	}
    //funcion para listar por id especifico
	public function getiddoc()
	{

	}

	//funcion para actualizar los docentes
	public function updatdoc()
	{

	}

	//funcion para eliminar los usuarios
	public function deletedoc()
	{
		
	}


	
}


?>