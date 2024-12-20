<?php
session_start(); // Iniciar la sesión al principio del archivo

require_once 'src/config/db.php';  // Conexión a la base de datos
require_once 'src/routes/routes.php';  // Archivo de rutas

$action = $_GET['route'] ?? '';
cargarRutas($action);


// Verificar si el usuario ya está autenticado
// if (!isset($_SESSION['id_user'])) {
//     cargarRutas($action);
// } else {
//     echo "hola mundo";
//     include 'src/views/dashboardView.php';
//     // header("Location: index.php?route=dashboard"); // Redirigir si ya está autenticado
//     exit();
// }
?>