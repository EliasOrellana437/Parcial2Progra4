<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

// Insertar estudiante
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre_completo'];
    $correo = $_POST['correo_institucional'];
    $telefono = $_POST['telefono'];

    $query = "INSERT INTO Estudiantes (nombre_completo, correo_institucional, telefono) 
              VALUES ('$nombre', '$correo', '$telefono')";
    mysqli_query($conexion, $query);
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
    <title>Dashboard - UGB</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Registro de Estudiantes Nuevos</h1>

    <form method="POST" action="">
        <label>Nombre completo:</label>
        <input type="text" name="nombre_completo" required>

        <label>Correo institucional:</label>
        <input type="email" name="correo_institucional" required>

        <label>Teléfono:</label>
        <input type="text" name="telefono">

        <button type="submit">Registrar</button>
    </form>

    <h2>Lista de Estudiantes</h2>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Teléfono</th>
        </tr>
        <?php
        $result = mysqli_query($conexion, "SELECT * FROM Estudiantes ORDER BY nombre_completo ASC");
        while ($fila = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$fila['nombre_completo']}</td>
                    <td>{$fila['correo_institucional']}</td>
                    <td>" . ($fila['telefono'] ? $fila['telefono'] : 'N/A') . "</td>
                  </tr>";
        }
        ?>
    </table>
<footer>
    <p>© 2026 Universidad Gerardo Barrios - El Salvador</p>
    <p>Contacto: info@ugb.edu.sv | Tel: (503) 2608-xxxx</p>
</footer>

</body>
</html>
