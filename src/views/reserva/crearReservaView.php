<?php
// Incluir el encabezado o plantilla general de la aplicación
include_once __DIR__ . '/../layout/header.php';
?>

<h2>Crear Nueva Reservación</h2>

<!-- Formulario para crear una nueva reservación -->
<form action="index.php?route=crearReserva" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required><br><br>

    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" required><br><br>

    <label for="telefono">Teléfono:</label>
    <input type="number" name="telefono" required><br><br>

    <label for="ID_habitacion">Habitación:</label>
    <input type="number" name="ID_habitacion" required><br><br>

    <label for="fecha_entrada">Fecha de Entrada:</label>
    <input type="date" name="fecha_entrada" required><br><br>

    <label for="fecha_salida">Fecha de Salida:</label>
    <input type="date" name="fecha_salida" required><br><br>

    <label for="precio">Precio:</label>
    <input type="number" step="0.01" name="precio" required><br><br>

    <input type="submit" value="Crear Reservación" class="button-acciones">
</form>

<br>

<?php
// Incluir el pie de página o plantilla general de la aplicación
include_once __DIR__ . '/../layout/footer.php';
?>
