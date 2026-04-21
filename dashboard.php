<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

// Insertar estudiante
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $carrera = $_POST['carrera'];
    $genero = $_POST['genero'];
    $beca = isset($_POST['beca']) ? 1 : 0;

    $query = "INSERT INTO estudiantes (nombre, carrera, genero, beca) 
              VALUES ('$nombre', '$carrera', '$genero', '$beca')";
    mysqli_query($conexion, $query);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - UGB</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Registro de Estudiantes Nuevos</h1>

    <form method="POST" action="">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>

        <label>Carrera:</label>
        <select name="carrera" required>
            <option value="Ingeniería en Sistemas">Ingeniería en Sistemas</option>
            <option value="Administración de Empresas">Administración de Empresas</option>
            <option value="Derecho">Derecho</option>
        </select>

        <label>Género:</label>
        <input type="radio" name="genero" value="Masculino" required> Masculino
        <input type="radio" name="genero" value="Femenino" required> Femenino

        <label>Beca:</label>
        <input type="checkbox" name="beca"> Aplica a beca

        <button type="submit">Registrar</button>
    </form>

    <h2>Lista de Estudiantes</h2>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Carrera</th>
            <th>Género</th>
            <th>Beca</th>
        </tr>
        <?php
        $result = mysqli_query($conexion, "SELECT * FROM estudiantes ORDER BY nombre ASC");
        while ($fila = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$fila['nombre']}</td>
                    <td>{$fila['carrera']}</td>
                    <td>{$fila['genero']}</td>
                    <td>" . ($fila['beca'] ? 'Sí' : 'No') . "</td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>
