<?php
// Incluir el encabezado o plantilla general de la aplicación
include_once __DIR__ . '/../layout/header.php';
?>
    <h2>Editar Cliente</h2>
    <form action="index.php?route=actualizarContactos" method="POST">
        <input type="hidden"  name="id" value="<?php echo $contactos['id']; ?>">

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $contactos['nombre']; ?>" required><br><br>

        <label for="correo">correo:</label>
        <input type="email" name="correo" value="<?php echo $contactos['correo']; ?>" required><br><br>

        <label for="mensaje">mensaje:</label>
        <input type="text" name="mensaje" value="<?php echo $contactos['mensaje']; ?>" required><br><br>

        <input type="submit" value="Actualizar Cliente" class="button-acciones">
    </form>
    <br>
<?php
// Incluir el encabezado o plantilla general de la aplicación
include_once __DIR__ . '/../layout/footer.php';
?>