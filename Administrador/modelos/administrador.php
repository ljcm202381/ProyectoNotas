<?php
include_once('../../Conexion.php');

class Administrador extends Conexion
{

	public function __construct()
	{
		$this->db = parent::__construct();
	}

	//funcion para registrar usuarios

	public function addusu()
	{
       $statement =$this->db->prepare("INSERT INTO usuarios(Nombreusu, Apellidousu, Usuario, Password, Perfil, Estado) VALUES(:Nombreusu, :Apellidousu, :Usuarioad, :Passwordad,'Administrador','Activo')");
		$statement->binParam(':Nombreusu',$Nombreusu);
		$statement->binParam(':Apellidousu',$Apellidousu);
		$statement->binParam(':Usuarioad',$Usuarioad);
		$statement->binParam(':Passwordad',$Passwordad);
		if($statement->execute()){
			header('Location: ../pages/index.php'):
		}else
		{
			header('Location: ../pages/agregar.php');
		}
	}

	//funcion para listar todos los usuarios

	public function getusu()
	{
		$row = null;
		$statement=$this->db->prepare("SELECT * FROM usuarios WHERE Perfil='Administrador'");
		$statement->execute();
		while($resul = $statement->fetch())
		{
          $row[]=$resul;
		}
		return $row;

	}
    //funcion para listar por id especifico
	public function getid($Id)
	{
		$row = null;
		$statement=$this->db->prepare("SELECT * FROM usuarios WHERE Perfil='Administrador' AND id_usuario=:Id");
		$statement->binParam(':Id',$Id);
		$statement->execute();
		while($resul = $statement->fetch())
		{
          $row[]=$resul;
		}
		return $row;

	}

	//funcion para actualizar los usuarios
	public function updateusu($Id, $Nombreusu, $Apellidousu, $Usuarioad, $Passwordad, $Estadousu)
	{
      $statement=$this->db->prepare("UPDATE usuarios SET Nombreusu= :Nombreusu, Apellidousu= :Nombreusu, Usuario= :Usuarioad, Password= :Passwordad, Estado= :Estadousu WHERE id_usuario = $Id");
        $statement->binParam(':Id',$Id);
        $statement->binParam(':Nombreusu',$Nombreusu);
		$statement->binParam(':Apellidousu',$Apellidousu);
		$statement->binParam(':Usuarioad',$Usuarioad);
		$statement->binParam(':Passwordad',$Passwordad);
		$statement->binParam(':Estadousu',$Estadousu);
		if($statement->execute()){
			header('Location: ../pages/index.php'):
		}else
		{
			header('Location: ../pages/editar.php');
		}

	}

	//funcion para eliminar los usuarios
	public function deleteusu($Id)
	{
	$statement=$this->db->prepare("DELETE FROM usuarios WHERE id_usuario=:Id");
	$statement->binParam(':Id',$Id);
	if($statement->execute()){
			header('Location: ../pages/index.php'):
		}else
		{
			header('Location: ../pages/eliminar.php');
		}

	}


	
}

?>