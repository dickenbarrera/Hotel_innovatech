<?php
// src/models/reservaModel.php
// Incluir la conexión a la base de datos
require_once __DIR__ . '/../config/db.php';

class EmpleadoModel {
    
    // Método para crear una nueva reservación
    public static function crearEmpleado($nombre, $apellido, $documento, $telefono, $cargo, $salario, $fecha_ingreso, $fecha_salida, $fecha_nacimiento) {
        global $conn;
        
        // Preparar la consulta SQL para insertar una nueva reservación
        $sql = "INSERT INTO empleado (nombre, apellido, documento, telefono, cargo, salario,  fecha_ingreso, fecha_salida, fecha_nacimiento) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";
        
        // Usar preparación para evitar inyecciones SQL
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param('sssssssss', $nombre, $apellido, $documento, $telefono, $cargo, $salario, $fecha_ingreso, $fecha_salida, $fecha_nacimiento);
            $stmt->execute();
            $stmt->close();
            return true;
        }
        return false;
    }

    // Método para obtener todas las reservaciones
    public static function obtenerEmpleado() {
        global $conn;
    
        // Verificar si la conexión es válida
        if (!$conn) {
            throw new Exception("Error: No hay conexión a la base de datos.");
        }
    
        // Consulta para obtener todos los inventarios
        $sql = "SELECT * FROM empleado";
        $result = $conn->query($sql);
    
        // Verificar si la consulta fue exitosa
        if (!$result) {
            throw new Exception("Error en la consulta: " . $conn->error);
        }
    
        // Procesar los resultados si hay datos
        if ($result->num_rows > 0) {
            $empleados = [];
            while ($row = $result->fetch_assoc()) {
                $empleados[] = $row;
            }
            return $empleados;
        }
    
        // Retornar un arreglo vacío si no hay resultados
        return [];
    }

    // Método para obtener una reservación por ID
    public static function obtenerEmpleadoporId($id) {
        global $conn;
        
        // Consulta para obtener una reservación por ID
        $sql = "SELECT * FROM empleado WHERE id = ?";
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
    public static function actualizarEmpleado($id,$nombre, $apellido, $documento, $telefono, $cargo, $salario, $fecha_ingreso, $fecha_salida, $fecha_nacimiento) {
        global $conn;
        
        // Consulta para actualizar la reservación
        $sql = "UPDATE empleado 
                SET nombre = ?, apellido = ?, documento = ?, telefono = ?, cargo = ?, salario = ?, fecha_ingreso = ? , fecha_salida = ? , fecha_nacimiento = ? 
                WHERE id = ?";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param('sssssssssi', $nombre, $apellido, $documento, $telefono, $cargo, $salario, $fecha_ingreso, $fecha_salida, $fecha_nacimiento, $id );
            $stmt->execute();
            $stmt->close();
            return true;
        }
        return false;
    }

    // Método para eliminar una reservación
    public static function eliminarEmpleado($id) {
        global $conn;
        
        // Consulta para eliminar una reservación
        $sql = "DELETE FROM empleado WHERE id = ?";
        
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
