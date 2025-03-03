<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include('db.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email) VALUES (?, ?)");
    $stmt->execute([$nombre, $email]);

    header('Location: index.php');
}
?>

<form method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required>
    <label for="email">Email</label>
    <input type="email" name="email" required>
    <button type="submit">Crear Usuario</button>
</form>
</body>
</html>