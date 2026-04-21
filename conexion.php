<?php
$host = "127.0.0.1";   // dirección local
$port = 3307;          // puerto de tu conexión XampTeOdio
$user = "root";        // usuario
$pass = "";            // pon aquí la contraseña si tu root la tiene
$db   = "parcial2";

$conexion = mysqli_connect($host, $user, $pass, $db, $port);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
