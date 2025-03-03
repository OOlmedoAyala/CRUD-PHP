document.querySelectorAll('.delete').forEach(button => {
    button.addEventListener('click', function(event) {
        if (!confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
            event.preventDefault();
        }
    });
});
