<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}

// Mostrar el panel según el tipo de usuario
echo "Bienvenido al panel de " . $_SESSION['tipo'];
?>
