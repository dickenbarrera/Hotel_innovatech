<?php
// Incluir el encabezado o plantilla general de la aplicación
include_once __DIR__ . '/../layout/header.php';
?>
    <h2>Lista de Reservaciones</h2>
    <a href="index.php?route=crear"><button class="button-acciones">Crear Nueva Reservación</button></a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Habitación</th>
                <th>Fecha de Entrada</th>
                <th>Fecha de Salida</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservaciones as $reserva): ?>
                <tr>
                    <td><?php echo $reserva['id']; ?></td>
                    <td><?php echo $reserva['nombre']; ?></td>
                    <td><?php echo $reserva['apellido']; ?></td>
                    <td><?php echo $reserva['telefono']; ?></td>
                    <td><?php echo $reserva['ID_habitacion']; ?></td>
                    <td><?php echo $reserva['fecha_entrada']; ?></td>
                    <td><?php echo $reserva['fecha_salida']; ?></td>
                    <td><?php echo $reserva['precio']; ?></td>
                    <td>
                        <a href="index.php?route=editar&id=<?php echo $reserva['id']; ?>"><button class="button-editar">Editar</button></a> 
                        <a href="index.php?route=eliminar&id=<?php echo $reserva['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar esta reservación?')"><button class="button-eliminar">Eliminar</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php


// Incluir el pie de página o plantilla general de la aplicación
include_once __DIR__ . '/../layout/footer.php';
?>
