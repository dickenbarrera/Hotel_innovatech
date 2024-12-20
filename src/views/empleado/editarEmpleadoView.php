<?php
// Incluir el encabezado o plantilla general de la aplicación
include_once __DIR__ . '/../layout/header.php';
?>
    <h2>Editar Empleado</h2>
    <form action="index.php?route=actualizarEmpleado" method="POST">
        <input  type="hidden" name="id" value="<?php echo $empleados['id']; ?>">

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $empleados['nombre']; ?>" required><br><br>

        <label for="apellido">apellido:</label>
        <input type="text" name="apellido" value="<?php echo $empleados['apellido']; ?>" required><br><br>

        <label for="documento">documento:</label>
        <input type="number" name="documento" value="<?php echo $empleados['documento']; ?>" required><br><br>

        <label for="telefono">telefono:</label>
        <input type="number" name="telefono" value="<?php echo $empleados['telefono']; ?>" required><br><br>

        <label for="cargo">cargo:</label>
        <input type="text" name="cargo" value="<?php echo $empleados['cargo']; ?>" required><br><br>

        <label for="salario">salario:</label>
        <input type="number" name="salario" value="<?php echo $empleados['salario']; ?>" required><br><br>

        <label for="fecha_ingreso">fecha ingreso:</label>
        <input type="date" name="fecha_ingreso" value="<?php echo $empleados['fecha_ingreso']; ?>" required><br><br>

        <label for="fecha_salida">fecha salida:</label>
        <input type="date" name="fecha_salida" value="<?php echo $empleados['fecha_salida']; ?>" required><br><br>

        <label for="fecha_nacimiento">fecha nacimiento:</label>
        <input type="date" name="fecha_nacimiento" value="<?php echo $empleados['fecha_nacimiento']; ?>" required><br><br>

        <input type="submit" value="Actualizar Empleado" class="button-acciones">
    </form>
    <br>
<?php
// Incluir el encabezado o plantilla general de la aplicación
include_once __DIR__ . '/../layout/footer.php';
?>