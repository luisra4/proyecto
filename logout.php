<?php
session_start();
session_destroy(); // Destruir la sesión
header("Location: login.html"); // Redirigir al inicio de sesión
exit();
?>
