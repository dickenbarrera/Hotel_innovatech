<?php
// src/models/reservaModel.php
// Incluir la conexión a la base de datos
require_once __DIR__ . '/../config/db.php';

class InventarioModel {
    
    // Método para crear una nueva reservación
    public static function crearInventario($codigo_producto, $nombre_producto, $descripcion, $cantidad_stock, $precio, $proveedor) {
        global $conn;
        
        // Preparar la consulta SQL para insertar una nueva reservación
        $sql = "INSERT INTO inventario (codigo_producto, nombre_producto, descripcion, cantidad_stock, precio, proveedor) 
                VALUES (?, ?, ?, ?, ?, ?)";
        
        // Usar preparación para evitar inyecciones SQL
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param('ssssss', $codigo_producto, $nombre_producto, $descripcion, $cantidad_stock, $precio, $proveedor);
            $stmt->execute();
            $stmt->close();
            return true;
        }
        return false;
    }

    // Método para obtener todas las reservaciones
    public static function obtenerInventario() {
        global $conn;
    
        // Verificar si la conexión es válida
        if (!$conn) {
            throw new Exception("Error: No hay conexión a la base de datos.");
        }
    
        // Consulta para obtener todos los inventarios
        $sql = "SELECT * FROM inventario";
        $result = $conn->query($sql);
    
        // Verificar si la consulta fue exitosa
        if (!$result) {
            throw new Exception("Error en la consulta: " . $conn->error);
        }
    
        // Procesar los resultados si hay datos
        if ($result->num_rows > 0) {
            $inventarios = [];
            while ($row = $result->fetch_assoc()) {
                $inventarios[] = $row;
            }
            return $inventarios;
        }
    
        // Retornar un arreglo vacío si no hay resultados
        return [];
    }

    // Método para obtener una reservación por ID
    public static function obtenerInventarioPorCodigo_producto($codigo_producto) {
        global $conn;
        
        // Consulta para obtener una reservación por ID
        $sql = "SELECT * FROM inventario WHERE codigo_producto = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param('i', $codigo_producto);
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
    public static function actualizarInventario($codigo_producto, $nombre_producto, $descripcion, $cantidad_stock, $precio, $proveedor) {
        global $conn;

        // Consulta para actualizar la reservación
        $sql = "UPDATE inventario 
                SET  nombre_producto = ?, descripcion = ?, cantidad_stock = ?, precio = ?, proveedor = ? 
                WHERE codigo_producto = ?";
  

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param('sssssi',  $nombre_producto, $descripcion, $cantidad_stock, $precio, $proveedor, $codigo_producto );
            //echo $stmt;
            //die();
            $stmt->execute();
            $stmt->close();
            return true;
        }
        return false;
    }

    // Método para eliminar una reservación
    public static function eliminarInventario($codigo_producto) {
        global $conn;
        
        // Consulta para eliminar una reservación
        $sql = "DELETE FROM inventario WHERE codigo_producto = ?";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param('i', $codigo_producto);
            $stmt->execute();
            $stmt->close();
            return true;
        }
        return false;
    }
}
?>
