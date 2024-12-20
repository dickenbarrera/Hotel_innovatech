<?php
require_once __DIR__ . '/../config/db.php';

class LoginModel {
    public static function obtenerUsuario($username, $hash_password) {
        global $conn; // Asegúrate de que la conexión esté disponible

        // Consulta SQL con parámetros
        $sql = "SELECT id_user FROM usuarios WHERE usuario = ? AND pass_user = ?";

        if ($stmt = $conn->prepare($sql)) {
            // Vincular los parámetros
            $stmt->bind_param('ss', $username, $hash_password);
            $stmt->execute();
            $stmt->store_result();

            // Verificar si el usuario existe
            if ($stmt->num_rows > 0) {
                // Vincular la variable para obtener el resultado
                $stmt->bind_result($id_user);
                $stmt->fetch();

                // Almacenar información en la sesión
                $_SESSION['id_user'] = $id_user;
                $_SESSION['username'] = $username;
                header("Location: index.php?route=dashboard");
                exit();
            } else {
                // Usuario no encontrado o contraseña incorrecta
                // echo "Credenciales  incorrectas.";
            }
            $stmt->close();
        } else {
            // Error en la preparación de la consulta
            echo "Error en la consulta: " . $conn->error;
        }
    }
}
?>