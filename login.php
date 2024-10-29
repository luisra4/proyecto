<?php
// Incluir la conexión a la base de datos
require 'db.php';
session_start();

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Preparar la consulta de selección
    $sql = "SELECT id, password, tipo FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashed_password, $tipo);
    $stmt->fetch();

    // Verificar si el correo existe y si la contraseña es correcta
    if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
        $_SESSION['usuario_id'] = $id;
        $_SESSION['tipo'] = $tipo;
        header("Location: dashboard.php");
    } else {
        echo "Correo o contraseña incorrectos.";
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
}
?>
