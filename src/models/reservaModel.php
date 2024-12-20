<?php
// src/models/reservaModel.php
// Incluir la conexión a la base de datos
require_once __DIR__ . '/../config/db.php';

class ReservaModel {
    
    // Método para crear una nueva reservación
    public static function crearReserva($nombre, $apellido, $telefono, $ID_habitacion, $fecha_entrada, $fecha_salida, $precio) {
        global $conn;

        // Preparar la consulta SQL para insertar una nueva reservación
        $sql = "INSERT INTO reservaciones (nombre, apellido, telefono, ID_habitacion, fecha_entrada, fecha_salida, precio) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        // Usar preparación para evitar inyecciones SQL
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param('sssssss', $nombre, $apellido, $telefono, $ID_habitacion, $fecha_entrada, $fecha_salida, $precio);
            $stmt->execute();
            $stmt->close();
            return true;
        }
        return false;
    }

    // Método para obtener todas las reservaciones
    public static function obtenerReservas() {
        global $conn;
        
        // Consulta para obtener todas las reservaciones
        $sql = "SELECT * FROM reservaciones";
        $result = $conn->query($sql);
        
        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            $reservaciones = [];
            while ($row = $result->fetch_assoc()) {
                $reservaciones[] = $row;
            }
            return $reservaciones;
        }
        return [];
    }

    // Método para obtener una reservación por ID
    public static function obtenerReservaPorId($id) {
        global $conn;
        
        // Consulta para obtener una reservación por ID
        $sql = "SELECT * FROM reservaciones WHERE id = ?";
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
    public static function actualizarReserva($id, $nombre, $apellido, $telefono, $ID_habitacion, $fecha_entrada, $fecha_salida, $precio) {
        global $conn;

        // Consulta para actualizar la reservación
        $sql = "UPDATE reservaciones 
                SET nombre = ?, apellido = ?, telefono = ?, ID_habitacion = ?, fecha_entrada = ?, fecha_salida = ?, precio = ? 
                WHERE id = ?";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param('sssssssi', $nombre, $apellido, $telefono, $ID_habitacion, $fecha_entrada, $fecha_salida, $precio, $id);
            $stmt->execute();
            $stmt->close();
            return true;
        }
        return false;
    }

    // Método para eliminar una reservación
    public static function eliminarReserva($id) {
        global $conn;
        
        // Consulta para eliminar una reservación
        $sql = "DELETE FROM reservaciones WHERE id = ?";
        
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
