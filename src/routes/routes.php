<?php

// src/routes/routes.php
// Función para cargar controladores y métodos dinámicamente

function cargarRutas($action) {
   
        // Rutas de Reservas
            require_once  'src/controllers/reservaController.php';
            require_once  'src/controllers/inventarioController.php';
            require_once  'src/controllers/empleadoController.php';
            require_once  'src/controllers/contactosController.php';
            require_once  'src/controllers/loginController.php';
            $controller = new reservaController();
            $Inventariocontroller = new inventarioController();
            $Empleadocontroller = new empleadoController();
            $Contactoscontroller = new contactosController();
            $logincontroller = new usuarioController();

            switch ($action) {
                case 'sesionStart':
                    $logincontroller->processLogin();
                    break;
                case 'CloseSesion':
                    // //    // Iniciar sesión si no está ya iniciada
                    // // session_start(); 

                    // // // Eliminar todas las variables de sesión
                    // // session_unset();

                    // Destruir la sesión
                    session_destroy();
                    $logincontroller->index();

                    // Redirigir al login
                    require_once 'src/views/login/login.php';
                    exit(); // Detiene la ejecución del código posterior
                    break;
                //rutas para reservas
                case'reservas':
                    $controller->index();
                    break;
                case'crear':
                    $controller->crear();;
                    break;
                case 'crearReserva':
                    $controller->guardar();
                    break;
                case 'editar':
                    $controller->editar($_GET['id'] ?? null);
                    break;
                case 'actualizarReserva':
                    $controller->actualizar();
                    break;
                case 'eliminar':
                    $controller->eliminar($_GET['id'] ?? null);
                    break;

                // Rutas para otras vistas como contactos
                case 'contactos':
                    $Contactoscontroller->indexContactos(); // Vista por crear
                    break;

                    // Ruta para ejecutar accioens en contactos
                case 'crearContactos':
                    $Contactoscontroller->crearContactos();
                    break;
                case 'guardarContactos':
                    $Contactoscontroller->guardarContactos();
                    break;
                case 'editarContactos':
                    $Contactoscontroller->editarContactos($_GET['id'] ?? null);
                    break;
                case 'actualizarContactos':
                    $Contactoscontroller->actualizarContactos();
                    break;
                case 'eliminarContactos':
                    $Contactoscontroller->eliminarContactos($_GET['id'] ?? null);
                    break;

                // Rutas para otras vistas como empleados
                case 'empleados':
                    $Empleadocontroller->indexEmpleado(); // Vista por crear
                    break;

                    // Ruta para ejecutar accioens en empleados
                case 'guardarEmpleado':
                    $Empleadocontroller->guardarEmpleado();                    
                    break;

                case 'crearEmpleado':
                    $Empleadocontroller->crearEmpleado();                    
                    break;

                case 'editarEmpleado':
                    $Empleadocontroller->editarEmpleado($_GET['id'] ?? null);
                    break;
                case 'actualizarEmpleado':
                    $Empleadocontroller->actualizarEmpleado();
                    break;
                case 'eliminarEmpleado':
                    $Empleadocontroller->eliminarEmpleado($_GET['id'] ?? null);
                    break;
                    
                    // Ruta para ejecutar inventarios
                case 'inventario':
                    $Inventariocontroller->indexInventario();
                    break;
                case 'crearInventario':
                    $Inventariocontroller->guardarInventario();
                    include_once 'src/views/inventario/crearInventarioView.php';
                    break;
                case 'editarInventario':
                    $Inventariocontroller->editarInventario($_GET['codigo_producto'] ?? null);
                    break;
                case 'actualizarInventario':
                    $Inventariocontroller->actualizarInventario();
                    break;
                case 'eliminarInventario':
                    $Inventariocontroller->eliminarInventario($_GET['codigo_producto'] ?? null);
                    break;

                // Ruta para el dashboard
                case 'dashboard':
                    include  'src/views/dashboardView.php';
                    break;

                default:
                    include  'src/views/login/login.php';
                    break;
            }
}   
?>
