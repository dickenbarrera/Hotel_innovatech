<?php
// src/models/reservaModel.php
// Incluir la conexión a la base de datos
require_once __DIR__ . '/../config/db.php';

class ContactosModel {
    
    // Método para crear una nueva reservación
    public static function crearContactos($nombre, $correo, $mensaje) {
        global $conn;
        
        // Preparar la consulta SQL para insertar una nueva reservación
        $sql = "INSERT INTO contactos (nombre, correo, mensaje) 
                VALUES (?, ?, ?)";
        
        // Usar preparación para evitar inyecciones SQL
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param('sss', $nombre, $correo, $mensaje);
            $stmt->execute();
            $stmt->close();
            return true;
        }
        return false;
    }

    // Método para obtener todas las reservaciones
    public static function obtenerContactos() {
        global $conn;
    
        // Verificar si la conexión es válida
        if (!$conn) {
            throw new Exception("Error: No hay conexión a la base de datos.");
        }
    
        // Consulta para obtener todos los inventarios
        $sql = "SELECT * FROM contactos";
        $result = $conn->query($sql);
    
        // Verificar si la consulta fue exitosa
        if (!$result) {
            throw new Exception("Error en la consulta: " . $conn->error);
        }
    
        // Procesar los resultados si hay datos
        if ($result->num_rows > 0) {
            $contactos = [];
            while ($row = $result->fetch_assoc()) {
                $contactos[] = $row;
            }
            return $contactos;
        }
    
        // Retornar un arreglo vacío si no hay resultados
        return [];
    }

    // Método para obtener una reservación por ID
    public static function obtenerContactosporID($id) {
        global $conn;
        
        // Consulta para obtener una reservación por ID
        $sql = "SELECT * FROM contactos WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            
            // Verificar si se encontró la reservación
            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            }
        }
        return null;
    }

    // Método para actualizar una reservación
    public static function actualizarContactos($id,$nombre, $correo, $mensaje) {
        global $conn;
        
        // Consulta para actualizar la reservación
        $sql = "UPDATE contactos 
                SET nombre = ?, correo = ?, mensaje = ?
                WHERE id = ?";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param('sssi', $nombre, $correo, $mensaje, $id );
            $stmt->execute();
            $stmt->close();
            return true;
        }
        return false;
    }

    // Método para eliminar una reservación
    public static function eliminarContactos($id) {
        global $conn;
        
        // Consulta para eliminar una reservación
        $sql = "DELETE FROM contactos WHERE id = ?";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $stmt->close();
            return true;
        }
        return false;
    }
}
?>
