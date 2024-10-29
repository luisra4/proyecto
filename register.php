<?php
// Incluir la conexión a la base de datos
require 'db.php';

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encriptar la contraseña
    $tipo = $_POST['tipo'];

    // Preparar la consulta de inserción
    $sql = "INSERT INTO usuarios (nombre, email, password, tipo) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nombre, $email, $password, $tipo);

    // Ejecutar la consulta y verificar el resultado
    if ($stmt->execute()) {
        echo "Registro exitoso.";
    } else {
        echo "Error en el registro: " . $conn->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
}
?>
