  <?php
require_once('../../Conexion.php');
require_once('../modelos/administrador.php');

$Id = $_POST['Id'];

$admin = new Administrador();
$row = $admin->deleteusu($Id);

?>