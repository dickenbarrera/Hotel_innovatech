<?php

class contactosController {

    // Función para mostrar la lista de reservas
    public function indexContactos() {
        try {
            require_once 'src/models/contactosModel.php'; // Cargar el modelo
            $contactosModel = new contactosModel();
            $contactos = $contactosModel->obtenerContactos();

            include 'src/views/contactos/contactosView.php'; // Cargar la vista
        } catch (Exception $e) {
            echo "Error al cargar la página de contactos: " . $e->getMessage();
        }
    } 

    // Función para mostrar el formulario de creación de reserva
    public function crearContactos() {
        try {
            include_once 'src/views/contactos/crearContactosView.php'; // Vista del formulario
        } catch (Exception $e) {
            echo "Error al cargar el formulario de creación: " . $e->getMessage();
        }
    }

    // Función para guardar una nueva reserva
    public function guardarContactos() {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                require_once 'src/models/ContactosModel.php';
                $contactosModel = new contactosModel();

                // Capturar datos del formulario
                $nombre = $_POST['nombre'] ?? '';
                $correo = $_POST['correo'] ?? '';
                $mensaje = $_POST['mensaje'] ?? '';

                // Guardar los datos en la base de datos
                $contactosModel->crearContactos($nombre, $correo, $mensaje);
                header("Location: index.php?route=contactos");
                exit();
            } else {
                echo "Método no permitido.";
            }
        } catch (Exception $e) {
            echo "Error al guardar la contactos: " . $e->getMessage();
        }
    }

    // Función para editar una reserva existente
    public function editarContactos($id) {
        try {
            require_once 'src/models/contactosModel.php';
            $contactosModel = new contactosModel();
            $contactos = $contactosModel->obtenerContactosporID($id);
            require_once 'src/views/contactos/editarContactosView.php';
        } catch (Exception $e) {
            echo "Error al cargar la página de edición: " . $e->getMessage();
        }
    }

    // Función para actualizar una reserva
    public function actualizarContactos() {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                require_once 'src/models/contactosModel.php';
                $contactosModel = new contactosModel();

                // Capturar datos del formulario
                $id = $_POST['id'] ?? '';
                $nombre = $_POST['nombre'] ?? '';
                $correo = $_POST['correo'] ?? '';
                $mensaje = $_POST['mensaje'] ?? '';

                // Actualizar la reserva
                $contactosModel->actualizarContactos($id,$nombre, $correo, $mensaje);
                header("Location: index.php?route=contactos");
                exit();
            } else {
                echo "Método no permitido.";
            }
        } catch (Exception $e) {
            echo "Error al actualizar la contactos: " . $e->getMessage();
        }
    }

    // Función para eliminar una reserva
    public function eliminarContactos($id) {
        try {
            require_once  'src/models/contactosModel.php';
            $contactosModel = new contactosModel();
            $contactosModel->eliminarContactos($id);
            header("Location: index.php?route=contactos");
            exit();
        } catch (Exception $e) {
            echo "Error al eliminar la contactos: " . $e->getMessage();
        }
    }
}

?>
