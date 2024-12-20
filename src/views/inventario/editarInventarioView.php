<?php
// Incluir el encabezado o plantilla general de la aplicación
include_once __DIR__ . '/../layout/header.php';
?>
<h2>Editar Producto</h2>
    <form action="index.php?route=actualizarInventario" method="POST">
        <input type="hidden" name="codigo_producto" value="<?php echo $inventarios['codigo_producto']; ?>" required>
        <label for="nombre_producto">nombre producto:</label>
        <input type="text" name="nombre_producto" value="<?php echo $inventarios['nombre_producto']; ?>" required><br><br>

        <label for="descripcion">descripcion:</label>
        <input type="text" name="descripcion" value="<?php echo $inventarios['descripcion']; ?>" required><br><br>

        <label for="cantidad_stock">cantidad stock:</label>
        <input type="number" name="cantidad_stock" value="<?php echo $inventarios['cantidad_stock']; ?>" required><br><br>

        <label for="precio">precio:</label>
        <input type="text" name="precio" value="<?php echo $inventarios['precio']; ?>" required><br><br>

        <label for="proveedor">proveedor:</label>
        <input type="text" name="proveedor" value="<?php echo $inventarios['proveedor']; ?>" required><br><br>

        <input type="submit" value="Actualizar Inventario" class="button-acciones">
    </form>
    <br>
<?php
// Incluir el encabezado o plantilla general de la aplicación
include_once __DIR__ . '/../layout/footer.php';
?>