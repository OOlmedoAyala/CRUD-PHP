<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Aplicación CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<?php
include('db.php');

$stmt = $conn->prepare("SELECT * FROM usuarios");
$stmt->execute();
$usuarios = $stmt->fetchAll();
?>

<a type="submit" href="create.php">Agregar Usuario</a>
<table>
    <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($usuarios as $usuario): ?>
    <tr>
        <td><?= $usuario['nombre']?></td>
        <td><?= $usuario['email']?></td>
        
        <td><!-- Manda llamar el script-->

        <a href="edit.php?id=<?= $usuario['id'] ?>">Editar</a>
        <a href="delete.php?id=<?= $usuario['id'] ?>" class="delete">Eliminar</a>

        </td>
    </tr>
    <?php endforeach; ?>
</table>
<script>
    document.querySelectorAll('.delete').forEach(button => {
    button.addEventListener('click', function(event) {
        if (!confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
            event.preventDefault();
        }
    });
});
</script>
</body>
</html>
