  <?php
require_once('../../Conexion.php');
require_once('../modelos/administrador.php');

$administrador = new Administrador();
// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el valor del ID a eliminar
    $Id = $_POST['Id'];

    // Llamar al método deleteusu() pasando el ID a eliminar
    $resultado = $administrador->deleteusu($Id);

    // Verificar el resultado de la operación de eliminación
    if ($resultado) {
        print "<script>alert(\"Usuario eliminado\");
        window.location='../pages/index.php';</script>";
    } else {
        echo "Error al eliminar el usuario.";
    }
} else {
     print "<script>alert(\"usuario no encontrado\");
        window.location='../pages/eliminar.php';</script>";
}

?>