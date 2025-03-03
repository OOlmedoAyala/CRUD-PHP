<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("UPDATE usuarios SET nombre = ?, email = ? WHERE id = ?");
    $stmt->execute([$nombre, $email, $id]);

    header('Location: index.php');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt->execute([$id]);
    $usuario = $stmt->fetch();
}
?>

<form method="POST">
    <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="<?= $usuario['nombre'] ?>" required>
    <label for="email">Email</label>
    <input type="email" name="email" value="<?= $usuario['email'] ?>" required>
    <button type="submit">Actualizar Usuario</button>
</form>

</body>
</html>
