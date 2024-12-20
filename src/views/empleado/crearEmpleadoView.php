<?php
// Incluir el encabezado o plantilla general de la aplicación
include_once __DIR__ . '/../layout/header.php';
?>
<div class="container">
    <h2>Crear Nueva Empleado</h2>
        <form action="index.php?route=guardarEmpleado" method="POST">
            <label for="nombre">nombre:</label>
            <input type="text" name="nombre" required><br><br>
    
            <label for="apellido">apellido:</label>
            <input type="text" name="apellido" required><br><br>
    
            <label for="documento">documento:</label>
            <input type="number" name="documento" required><br><br>
    
            <label for="telefono">telefono:</label>
            <input type="number" name="telefono" required><br><br>
    
            <label for="cargo">cargo:</label>
            <input type="text" name="cargo" required><br><br>
    
            <label for="salario">salario:</label>
            <input type="number" name="salario" required><br><br>
    
            <label for="fecha_ingreso">fecha ingreso:</label>
            <input type="date" name="fecha_ingreso" required><br><br>
    
            <label for="fecha_salida">fecha salida:</label>
            <input type="date" name="fecha_salida" required><br><br>
    
            <label for="fecha_nacimiento">fecha nacimiento:</label>
            <input type="date" name="fecha_nacimiento" required><br><br>
    
            <input type="submit" value="Crear Empleado" class="button-acciones"><br><br><br><br>
        </form>
</div>

<?php
// Incluir el pie de página o plantilla general de la aplicación
include_once __DIR__ . '/../layout/footer.php';
?>
