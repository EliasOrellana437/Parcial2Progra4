<?php
session_start();
include 'conexion.php';

// LOGIN
if (isset($_POST['login'])) {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    $query = "SELECT * FROM usuarios_admin WHERE usuario='$usuario' AND clave='$clave'";
    $resultado = mysqli_query($conexion, $query);

    if (mysqli_num_rows($resultado) > 0) {
        $_SESSION['usuario'] = $usuario;
        header("Location: dashboard.php");
        exit();
    } else {
        $error_login = "Usuario o contraseña incorrectos";
    }
}

// REGISTRO
if (isset($_POST['registro'])) {
    $usuario = $_POST['nuevo_usuario'];
    $clave = $_POST['nueva_clave'];
    $facultad = $_POST['facultad'];

    $query = "INSERT INTO usuarios_admin (usuario, clave, facultad) 
              VALUES ('$usuario', '$clave', '$facultad')";
    if (mysqli_query($conexion, $query)) {
        $exito_registro = "Usuario registrado correctamente, ahora puede iniciar sesión.";
    } else {
        $error_registro = "Error al registrar usuario.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<header>
    <div class="logo">
        <img src="ugb_logo.png" alt="UGB Logo">
    </div>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="#">Institucional</a>
        <a href="#">Admisiones</a>
        <a href="#">Vida Universitaria</a>
        <a href="#">Investigación</a>
    </nav>
</header>

<head>
    <meta charset="UTF-8">
    <title>Registro/Login - UGB</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <body>
    <h1>Sistema de Inscripción UGB</h1>

    <div class="contenedor">
        <!-- FORMULARIO DE REGISTRO -->
        <section class="formulario">
            <h2>Registro de nuevo usuario</h2>
            <form method="POST" action="">
                <label>Usuario:</label>
                <input type="text" name="nuevo_usuario" required>

                <label>Contraseña:</label>
                <input type="password" name="nueva_clave" required>

                <label>Facultad:</label>
                <select name="facultad" required>
                    <option value="Ingeniería">Ingeniería</option>
                    <option value="Ciencias Económicas">Ciencias Económicas</option>
                    <option value="Derecho">Derecho</option>
                </select>

                <button type="submit" name="registro">Registrar</button>
            </form>
        </section>

        <!-- FORMULARIO DE LOGIN -->
        <section class="formulario">
            <h2>Ya registrado? Inicie sesión</h2>
            <form method="POST" action="">
                <label>Usuario:</label>
                <input type="text" name="usuario" required>
                
                <label>Contraseña:</label>
                <input type="password" name="clave" required>
                
                <button type="submit" name="login">Ingresar</button>
            </form>
        </section>
    </div>
</body>

<footer>
    <p>© 2026 Universidad Gerardo Barrios - El Salvador</p>
    <p>Contacto: info@ugb.edu.sv | Tel: (503) 2608-xxxx</p>
</footer>

</body>
</html>
