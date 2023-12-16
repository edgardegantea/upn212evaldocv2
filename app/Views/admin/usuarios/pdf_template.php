<!-- app/Views/users/pdf_template.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Detalles de Usuario (PDF)</title>
</head>
<body>
    <h1>Detalles de Usuario</h1>

    <p>ID: <?php echo $usuario['id']; ?></p>
    <p>Nombre: <?php echo $usuario['nombre']; ?></p>
    <p>Email: <?php echo $usuario['email']; ?></p>
    <!-- Mostrar más detalles si es necesario -->
</body>
</html>
