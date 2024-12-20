<?php

class inventarioController {

    // Función para mostrar la lista de reservas
    public function indexInventario() {
        try {
            require_once 'src/models/inventarioModel.php'; // Cargar el modelo
            $inventarioModel = new inventarioModel();
            $inventarios = $inventarioModel->obtenerInventario();

            include 'src/views/inventario/inventarioView.php'; // Cargar la vista
        } catch (Exception $e) {
            echo "Error al cargar la página de inventario: " . $e->getMessage();
        }
    } 

    // Función para mostrar el formulario de creación de reserva
    public function crearInventario() {
        try {
            include_once 'src/views/inventario/crearInventarioView.php'; // Vista del formulario
        } catch (Exception $e) {
            echo "Error al cargar el formulario de creación: " . $e->getMessage();
        }
    }

    // Función para guardar una nueva reserva
    public function guardarInventario() {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                require_once 'src/models/inventarioModel.php';
                $inventarioModel = new inventarioModel();

                // Capturar datos del formulario
                $codigo_producto = $_POST['codigo_producto'] ?? '';
                $nombre_producto = $_POST['nombre_producto'] ?? '';
                $descripcion = $_POST['descripcion'] ?? '';
                $cantidad_stock = $_POST['cantidad_stock'] ?? '';
                $precio = $_POST['precio'] ?? '';
                $proveedor = $_POST['proveedor'] ?? '';

                // Guardar los datos en la base de datos
                $inventarioModel->crearInventario($codigo_producto, $nombre_producto, $descripcion, $cantidad_stock, $precio, $proveedor);
                header("Location: index.php?route=inventario");
                exit();
            } /*else {
                echo "Método no permitido.";
            }*/
        } catch (Exception $e) {
            echo "Error al guardar la inventario: " . $e->getMessage();
        }
    }

    // Función para editar una reserva existente
    public function editarInventario($codigo_producto) {
        try {
            require_once 'src/models/inventarioModel.php';
            $inventarioModel = new inventarioModel();
            $inventarios = $inventarioModel->obtenerInventarioPorCodigo_producto($codigo_producto);
            require_once 'src/views/inventario/editarInventarioView.php';
        } catch (Exception $e) {
            echo "Error al cargar la página de edición: " . $e->getMessage();
        }
    }

    // Función para actualizar una reserva
    public function actualizarInventario() {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                require_once 'src/models/inventarioModel.php';
                $inventarioModel = new inventarioModel();

                // Capturar datos del formulario
                $codigo_producto = $_POST['codigo_producto'] ?? '';
                $nombre_producto = $_POST['nombre_producto'] ?? '';
                $descripcion = $_POST['descripcion'] ?? '';
                $cantidad_stock = $_POST['cantidad_stock'] ?? '';
                $precio = $_POST['precio'] ?? '';
                $proveedor = $_POST['proveedor'] ?? '';

                // Actualizar la reserva
                $inventarioModel->actualizarInventario($codigo_producto, $nombre_producto, $descripcion, $cantidad_stock, $precio, $proveedor);
                header("Location: index.php?route=inventario");
                exit();
            } else {
                echo "Método no permitido.";
            }
        } catch (Exception $e) {
            echo "Error al actualizar la inventario: " . $e->getMessage();
        }
    }

    // Función para eliminar una reserva
    public function eliminarInventario($codigo_producto) {
        try {
            require_once  'src/models/inventarioModel.php';
            $inventarioModel = new inventarioModel();
            $inventarioModel->eliminarInventario($codigo_producto);
            header("Location: index.php?route=inventario");
            exit();
        } catch (Exception $e) {
            echo "Error al eliminar la inventario: " . $e->getMessage();
        }
    }
}

?>
