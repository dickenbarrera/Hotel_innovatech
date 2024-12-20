<?php
require_once __DIR__ . '/../models/loginModel.php';

class UsuarioController {
    public static function processLogin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Capturar datos del formulario
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? ''; // Aquí se captura la contraseña ingresada
            $hash_password= base64_encode($password);
            // Intentar autenticar al usuario
            if (!LoginModel::obtenerUsuario($username, $hash_password)) {
                echo "Credenciales incorrectas. <br>";
                
            }
            exit();
        }
    }

    public function index() {
        include_once 'src/views/login/login.php';
    }
}
?>