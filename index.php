<?php
session_start();
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    // Buscar usuario en la tabla usuarios_admin
    $query = "SELECT * FROM usuarios_admin WHERE usuario='$usuario' AND clave='$clave'";
    $resultado = mysqli_query($conexion, $query);

    if (mysqli_num_rows($resultado) > 0) {
        $_SESSION['usuario'] = $usuario;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - UGB</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Ingreso al sistema</h1>
    <form method="POST" action="">
        <label>Usuario:</label>
        <input type="text" name="usuario" required>
        
        <label>Contraseña:</label>
        <input type="password" name="clave" required>
        
        <button type="submit">Ingresar</button>
    </form>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
</body>
</html>
