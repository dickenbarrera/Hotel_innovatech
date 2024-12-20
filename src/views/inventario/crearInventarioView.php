<?php
// Incluir el encabezado o plantilla general de la aplicación
include_once __DIR__ . '/../layout/header.php';
?>

<h2>Crear Nueva Producto</h2>
    <form action="index.php?route=crearInventario" method="POST">
        <label for="codigo_producto">codigo producto:</label>
        <input type="number" name="codigo_producto" required><br><br>

        <label for="nombre_producto">nombre producto:</label>
        <input type="text" name="nombre_producto" required><br><br>

        <label for="descripcion">descripcion:</label>
        <input type="text" name="descripcion" required><br><br>

        <label for="cantidad_stock">cantidad stock:</label>
        <input type="number" name="cantidad_stock" required><br><br>

        <label for="precio">precio:</label>
        <input type="number" name="precio" required><br><br>

        <label for="proveedor">proveedor:</label>
        <input type="text" name="proveedor" required><br><br>

        <input type="submit"  value="Crear Inventario" class="button-acciones">
    </form>
    <br>

<?php
// Incluir el pie de página o plantilla general de la aplicación
include_once __DIR__ . '/../layout/footer.php';
?>
