// JavaScript general para la aplicación

document.addEventListener('DOMContentLoaded', function() {
    // Confirmación de eliminación
    const deleteLinks = document.querySelectorAll('a[href*="eliminar"]');
    
    deleteLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            if (!confirm('¿Estás seguro de que deseas eliminar esta reservación?')) {
                event.preventDefault(); // Detener la acción si se cancela
            }
        });
    });

    // Validación de formularios (puedes agregar más validaciones según sea necesario)
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(event) {
            const nombre = form.querySelector('input[name="nombre"]');
            const apellido = form.querySelector('input[name="apellido"]');
            
            if (nombre.value.trim() === '' || apellido.value.trim() === '') {
                alert('Por favor, complete todos los campos obligatorios.');
                event.preventDefault(); // Prevenir el envío del formulario
            }
        });
    }
});

