<?php
// Incluir el encabezado o plantilla general de la aplicación
include_once __DIR__ . '/../layout/header.php';
?>
<h2>Editar Reservación</h2>
    <form action="index.php?route=actualizarReserva" method="POST">
        <input type="hidden" name="id" value="<?php echo $reserva['id']; ?>">

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $reserva['nombre']; ?>" required><br><br>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" value="<?php echo $reserva['apellido']; ?>" required><br><br>

        <label for="telefono">Teléfono:</label>
        <input type="number" name="telefono" value="<?php echo $reserva['telefono']; ?>" required><br><br>

        <label for="ID_habitacion">Habitación:</label>
        <input type="number" name="ID_habitacion" value="<?php echo $reserva['ID_habitacion']; ?>" required><br><br>

        <label for="fecha_entrada">Fecha de Entrada:</label>
        <input type="date" name="fecha_entrada" value="<?php echo $reserva['fecha_entrada']; ?>" required><br><br>

        <label for="fecha_salida">Fecha de Salida:</label>
        <input type="date" name="fecha_salida" value="<?php echo $reserva['fecha_salida']; ?>" required><br><br>

        <label for="precio">Precio:</label>
        <input type="number" step="0.01" name="precio" value="<?php echo $reserva['precio']; ?>" required><br><br>

        <input type="submit" value="Actualizar Reservación" class="button-acciones">
    </form>
    <br>
<?php
// Incluir el encabezado o plantilla general de la aplicación
include_once __DIR__ . '/../layout/footer.php';
?>