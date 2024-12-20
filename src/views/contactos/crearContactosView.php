<?php
// Incluir el encabezado o plantilla general de la aplicación
include_once __DIR__ . '/../layout/header.php';
?>
<div class="container">
<h2>Crear Nueva Cliente</h2>
    <form action="index.php?route=guardarContactos" method="POST">
        <label for="nombre">nombre:</label>
        <input type="text" name="nombre" required><br><br>

        <label for="correo">correo:</label>
        <input type="email" name="correo" required><br><br>

        <label for="mensaje">mensaje:</label>
        <input type="text" name="mensaje" required><br><br>

        <input type="submit" value="Crear Cliente" class="button-acciones">
    </form>
</div>

<?php
// Incluir el pie de página o plantilla general de la aplicación
include_once __DIR__ . '/../layout/footer.php';
?>
