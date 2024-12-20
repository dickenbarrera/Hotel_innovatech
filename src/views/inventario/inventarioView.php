<?php
// Incluir el encabezado o plantilla general de la aplicación
include_once __DIR__ . '/../layout/header.php';
// if(isset($_SESSION['id_user'])){
?>
    <h2>Lista de Inventario</h2>
    <a href="index.php?route=crearInventario"><button class="button-acciones">Crear Nueva Producto</button></a>
    <table border="1">
        <thead>
            <tr>
                <th>codigo producto</th>
                <th>nombre producto</th>
                <th>descripcion</th>
                <th>cantidad stock</th>
                <th>precio</th>
                <th>proveedor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inventarios as $inventario): ?>
                <tr>
                    <td><?php echo $inventario['codigo_producto']; ?></td>
                    <td><?php echo $inventario['nombre_producto']; ?></td>
                    <td><?php echo $inventario['descripcion']; ?></td>
                    <td><?php echo $inventario['cantidad_stock']; ?></td>
                    <td><?php echo $inventario['precio']; ?></td>
                    <td><?php echo $inventario['proveedor']; ?></td>
                    <td>
                        <a href="index.php?route=editarInventario&codigo_producto=<?php echo $inventario['codigo_producto']; ?>"><button class="button-editar">Editar</button></a> 
                        <a href="index.php?route=eliminarInventario&codigo_producto=<?php echo $inventario['codigo_producto']; ?>" onclick="return confirm('¿Estás seguro de eliminar esta Producto?')"><button class="button-eliminar">Eliminar</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php


// Incluir el pie de página o plantilla general de la aplicación
include_once __DIR__ . '/../layout/footer.php';
// }
?>
