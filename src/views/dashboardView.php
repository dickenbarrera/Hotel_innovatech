<?php 
include 'layout/header.php'; 
// if(isset($_SESSION['id_user'])){


?>

<main>
    <h1>Panel de Control</h1>
    <p>Bienvenido al sistema de gestión. Seleccione una opción para continuar:</p>

    <div class="dashboard-container">
        <div class="dashboard-card">
            <h2>Gestión de Reservas</h2>
            <p>Administra las reservaciones del hotel.</p>
            <a href="index.php?route=reservas" class="btn">Ir a Reservas</a>
        </div>
        <div class="dashboard-card">
            <h2>Gestión de Clientes</h2>
            <p>Administra los Clientes del hotel.</p>
            <a href="index.php?route=contactos" class="btn">Ir a Clientes</a>
        </div>

        <!-- <div class="dashboard-card">
            <h2>Gestión de Empleados</h2>
            <p>Administra la información de los empleados.</p>
            <a href="index.php?route=empleados" class="btn">Ir a Empleados</a>
        </div> -->

        <div class="dashboard-card">
            <h2>Gestión de Inventario</h2>
            <p>Administra el inventario de recursos.</p>
            <a href="index.php?route=inventario" class="btn">Ir a Inventario</a>
        </div>
    </div>

</main>





<?php 

include 'layout/footer.php'; 
// }
?>
