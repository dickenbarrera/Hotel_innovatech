<?php
// Incluir el encabezado o plantilla general de la aplicación
include_once __DIR__ . '/../layout/header.php';
// session_start();
// if(isset($_SESSION['id_user'])){
// Comprobar si estamos mostrando el formulario de creación o actualización
?>
    <h2>Lista de Cliente</h2>
    <a href="index.php?route=crearContactos"><button class="button-acciones">Crear Nueva Cliente</button></a>
    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>nombre </th>
                <th>apellido</th>
                <th>documento</th>
                <th>acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contactos as $contacto): ?>
                <tr>
                    <td><?php echo $contacto['id']; ?></td>
                    <td><?php echo $contacto['nombre']; ?></td>
                    <td><?php echo $contacto['correo']; ?></td>
                    <td><?php echo $contacto['mensaje']; ?></td>
                    <td>
                        <a href="index.php?route=editarContactos&id=<?php echo $contacto['id']; ?>"><button class="button-editar">Editar</button></a> 
                        <a href="index.php?route=eliminarContactos&id=<?php echo $contacto['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este empleado?')"><button class="button-eliminar">Eliminar</button></a>
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
