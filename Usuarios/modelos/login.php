<?php
require_once('../../Conexion.php');
session_start();
class Usuario extends Conexion
{
    private $loggedIn = false; // Estado de inicio de sesión
    private $isAdmin = false; // Estado de administrador
    private $isdocente = false; // Estado de docente
    

  
	//definir el constructor para llamar a la bd
    public function __construct()
    {
    	$this->db = parent:: __construct();
     
    }
    public function login($username, $password)
    {
        // Obtener el usuario de la base de datos
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE Usuario = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar la contraseña
        if ($user && password_verify($password, $user['Password'])) {
           

           
            // Iniciar sesión
            $_SESSION['user_id'] = $user['id_usuario'];
            $_SESSION['username'] = $user['Usuario'];
            $_SESSION['role'] = $user['Perfil'];
            $_SESSION["validar"] = true;
            $_SESSION['NOMBRE'] = $user['Nombreusu']." ".$user['Apellidousu'];
         
                        
        }

        }
    public function validarSesion()
    {
    
   
        if($_SESSION['username']){
     if (!isset($_SESSION['start'])) {
    $_SESSION['start']=time();
}
else if (time() - $_SESSION['start'] > 60) {
    session_destroy();
     echo "<script>
          alert('cierre de sesion por inaactividad');
          window.location = '../../index.php';
      </script>";   
    $_SESSION["validar"]==false;  
}
$_SESSION['start']=time(); //Si hay actividad seteamos el valor al tiempo actual

    }
}


  
public function cerrarSesion()
    {
        session_unset();
        session_destroy();
        echo 'Sesión cerrada.';
    }
    
     
  public function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }

    public function isAdmin()
    {
        return $this->isLoggedIn() && $_SESSION['role'] === 'Administrador';
    }

    public function isTeacher()
    {
        return $this->isLoggedIn() && $_SESSION['role'] === 'Docentes';
    }

  }
   

?>