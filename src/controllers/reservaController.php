<?php

class reservaController {

    // Función para mostrar la lista de reservas
    public function index() {
        try {
            require_once 'src/models/reservaModel.php'; // Cargar el modelo
            $reservaModel = new reservaModel();
            $reservaciones = $reservaModel->obtenerReservas();
            include 'src/views/reserva/reservaView.php'; // Cargar la vista
        } catch (Exception $e) {
            echo "Error al cargar la página de reservas: " . $e->getMessage();
        }
    }

    // Función para mostrar el formulario de creación de reserva
    public function crear() {
        try {
            include_once 'src/views/reserva/crearReservaView.php'; // Vista del formulario
        } catch (Exception $e) {
            echo "Error al cargar el formulario de creación: " . $e->getMessage();
        }
    }

    // Función para guardar una nueva reserva
    public function guardar() {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                require_once 'src/models/reservaModel.php';
                $reservaModel = new reservaModel();

                // Capturar datos del formulario
                $nombre = $_POST['nombre'] ?? '';
                $apellido = $_POST['apellido'] ?? '';
                $telefono = $_POST['telefono'] ?? '';
                $cargo = $_POST['cargo'] ?? '';
                $ID_habitacion = $_POST['ID_habitacion'] ?? '';
                $fecha_entrada = $_POST['fecha_entrada'] ?? '';
                $fecha_salida = $_POST['fecha_salida'] ?? '';
                $precio = $_POST['precio'] ?? '';
                
                // Guardar los datos en la base de datos
                $reservaModel->crearReserva($nombre, $apellido, $telefono, $ID_habitacion, $fecha_entrada, $fecha_salida, $precio);
                header("Location: index.php?route=reservas");
                exit();
            } else {
                echo "Método no permitido.";
            }
        } catch (Exception $e) {
            echo "Error al guardar la reserva: " . $e->getMessage();
        }
    }

    // Función para editar una reserva existente
    public function editar($id) {
        try {
            require_once 'src/models/reservaModel.php';
            $reservaModel = new reservaModel();
            $reserva = $reservaModel->obtenerReservaPorId($id);
            require_once 'src/views/reserva/editarReservaView.php';
        } catch (Exception $e) {
            echo "Error al cargar la página de edición: " . $e->getMessage();
        }
    }

    // Función para actualizar una reserva
    public function actualizar() {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                require_once 'src/models/reservaModel.php';
                $reservaModel = new reservaModel();

                // Capturar datos del formulario
                $id = $_POST['id'] ?? '';
                $nombre = $_POST['nombre'] ?? '';
                $apellido = $_POST['apellido'] ?? '';
                $telefono = $_POST['telefono'] ?? '';
                $ID_habitacion = $_POST['ID_habitacion'] ?? '';
                $fecha_entrada = $_POST['fecha_entrada'] ?? '';
                $fecha_salida = $_POST['fecha_salida'] ?? '';
                $precio = $_POST['precio'] ?? '';

                // Actualizar la reserva
                $reservaModel->actualizarReserva($id, $nombre, $apellido, $telefono, $ID_habitacion, $fecha_entrada, $fecha_salida, $precio);
                header("Location: index.php?route=reservas");
                exit();
            } else {
                echo "Método no permitido.";
            }
        } catch (Exception $e) {
            echo "Error al actualizar la reserva: " . $e->getMessage();
        }
    }

    // Función para eliminar una reserva
    public function eliminar($id) {
        try {
            require_once  'src/models/reservaModel.php';
            $reservaModel = new reservaModel();
            $reservaModel->eliminarReserva($id);
            header("Location: index.php?route=reservas");
            exit();
        } catch (Exception $e) {
            echo "Error al eliminar la reserva: " . $e->getMessage();
        }
    }
}

?>
