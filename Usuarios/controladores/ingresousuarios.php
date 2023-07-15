<?php

require_once('../../Conexion.php');
require_once('../modelos/login.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores enviados por el formulario
    $username = $_POST['txtusuario'];
    $password = $_POST['txtcontrasena'];

    // Crear una instancia de la clase Usuario
    $user = new Usuario();

    // Iniciar sesión
    $user->login($username, $password);
    
    
    // $user->validarSesion();

     // Redirigir al controlador adecuado según el rol del usuario
    if ($user->isLoggedIn()) {
        if ($user->isAdmin()) {
            header('Location: ../../Administrador/pages/index.php');
        } elseif ($user->isTeacher()) {
            header('Location: ../../Materias/pages/index.php');
        }
        exit();
    } else {
        print "<script>alert(\"Nombre de usuario incorrectos.\");window.location='../../index.php';</script>";
    }


}



?>