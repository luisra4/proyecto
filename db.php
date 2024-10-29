<?php
// Parámetros de conexión a la base de datos
$servername = "localhost";
$username = "root"; // Nombre de usuario de la base de datos
$password = "";     // Contraseña de la base de datos
$dbname = "hotel";  // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
