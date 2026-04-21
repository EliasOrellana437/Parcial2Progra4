<?php
$host = "127.0.0.1";   // o "localhost"
$port = "3307";        // puerto que usa tu conexión XampTeOdio
$user = "root";
$pass = "";            // si no tienes contraseña en XAMPP
$db   = "parcial2";

$conexion = mysqli_connect($host, $user, $pass, $db, $port);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
