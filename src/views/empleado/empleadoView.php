<?php
// Incluir el encabezado o plantilla general de la aplicación
include_once __DIR__ . '/../layout/header.php';
session_start();
if(isset($_SESSION['id_user'])){
?>
    <h2>Lista de Empleados</h2>
    <a href="index.php?route=crearEmpleado"><button class="button-acciones">Crear Nueva Empleados</button></a>
    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>nombre </th>
                <th>apellido</th>
                <th>documento</th>
                <th>telefono</th>
                <th>cargo</th>
                <th>salario</th>
                <th>fecha ingreso</th>
                <th>fecha salida</th>
                <th>fecha nacimiento</th>
                <th>acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empleados as $empleado): ?>
                <tr>
                    <td><?php echo $empleado['id']; ?></td>
                    <td><?php echo $empleado['nombre']; ?></td>
                    <td><?php echo $empleado['apellido']; ?></td>
                    <td><?php echo $empleado['documento']; ?></td>
                    <td><?php echo $empleado['telefono']; ?></td>
                    <td><?php echo $empleado['cargo']; ?></td>
                    <td><?php echo $empleado['salario']; ?></td>
                    <td><?php echo $empleado['fecha_ingreso']; ?></td>
                    <td><?php echo $empleado['fecha_salida']; ?></td>
                    <td><?php echo $empleado['fecha_nacimiento']; ?></td>
                    <td>
                        <a href="index.php?route=editarEmpleado&id=<?php echo $empleado['id']; ?>"><button class="button-editar">Editar</button></a> 
                        <a href="index.php?route=eliminarEmpleado&id=<?php echo $empleado['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este empleado?')"><button class="button-eliminar">Eliminar</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php


// Incluir el pie de página o plantilla general de la aplicación
include_once __DIR__ . '/../layout/footer.php';
}
?>
