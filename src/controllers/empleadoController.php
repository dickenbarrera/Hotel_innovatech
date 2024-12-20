<?php

class empleadoController {

    // Función para mostrar la lista de reservas
    public function indexEmpleado() {
        try {
            require_once 'src/models/empleadoModel.php'; // Cargar el modelo
            $empleadoModel = new empleadoModel();
            $empleados = $empleadoModel->obtenerEmpleado();

            include 'src/views/empleado/empleadoView.php'; // Cargar la vista
        } catch (Exception $e) {
            echo "Error al cargar la página de empleado: " . $e->getMessage();
        }
    } 

    // Función para mostrar el formulario de creación de reserva
    public function crearEmpleado() {
        try {
            require_once 'src/views/empleado/crearEmpleadoView.php'; // Vista del formulario
        } catch (Exception $e) {
            echo "Error al cargar el formulario de creación: " . $e->getMessage();
        }
    }

    // Función para guardar una nueva reserva
    public function guardarEmpleado() {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                require_once 'src/models/EmpleadoModel.php';
                $empleadoModel = new empleadoModel();

                // Capturar datos del formulario
                $nombre = $_POST['nombre'] ?? '';
                $apellido = $_POST['apellido'] ?? '';
                $documento = $_POST['documento'] ?? '';
                $telefono = $_POST['telefono'] ?? '';
                $cargo = $_POST['cargo'] ?? '';
                $salario = $_POST['salario'] ?? '';
                $fecha_ingreso = $_POST['fecha_ingreso'] ?? '';
                $fecha_salida = $_POST['fecha_salida'] ?? '';
                $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? '';

                // Guardar los datos en la base de datos
                $empleadoModel->crearEmpleado($nombre, $apellido, $documento, $telefono,$cargo, $salario, $fecha_ingreso, $fecha_salida, $fecha_nacimiento);
                header("Location: index.php?route=empleados");
                exit();
            } else {
                echo "Método no permitido.";
            }
        } catch (Exception $e) {
            echo "Error al guardar la inventario: " . $e->getMessage();
        }
    }

    // Función para editar una reserva existente
    public function editarEmpleado($id) {
        try {
            require_once 'src/models/empleadoModel.php';
            $empleadoModel = new empleadoModel();
            $empleados = $empleadoModel->obtenerEmpleadoporId($id);
            require_once 'src/views/empleado/editarEmpleadoView.php';
        } catch (Exception $e) {
            echo "Error al cargar la página de edición: " . $e->getMessage();
        }
    }

    // Función para actualizar una reserva
    public function actualizarEmpleado() {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                require_once 'src/models/empleadoModel.php';
                $empleadoModel = new empleadoModel();

                // Capturar datos del formulario
                $id = $_POST['id'] ?? '';
                $nombre = $_POST['nombre'] ?? '';
                $apellido = $_POST['apellido'] ?? '';
                $documento = $_POST['documento'] ?? '';
                $telefono = $_POST['telefono'] ?? '';
                $cargo = $_POST['cargo'] ?? '';
                $salario = $_POST['salario'] ?? '';
                $fecha_ingreso = $_POST['fecha_ingreso'] ?? '';
                $fecha_salida = $_POST['fecha_salida'] ?? '';
                $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? '';

                // Actualizar la reserva
                $empleadoModel->actualizarEmpleado($id,$nombre, $apellido, $documento, $telefono, $cargo, $salario, $fecha_ingreso, $fecha_salida, $fecha_nacimiento);
                header("Location: index.php?route=empleados");
                exit();
            } else {
                echo "Método no permitido.";
            }
        } catch (Exception $e) {
            echo "Error al actualizar la empleado: " . $e->getMessage();
        }
    }

    // Función para eliminar una reserva
    public function eliminarEmpleado($id) {
        try {
            require_once  'src/models/empleadoModel.php';
            $empleadoModel = new empleadoModel();
            $empleadoModel->eliminarEmpleado($id);
            header("Location: index.php?route=empleados");
            exit();
        } catch (Exception $e) {
            echo "Error al eliminar la empleado: " . $e->getMessage();
        }
    }
}

?>
