<?php
$host = 'localhost';
$usuario = 'root';
$password = '';
$base_de_datos = 'hotel';

$conexion = mysqli_connect($host, $usuario, $password, $base_de_datos);

if (!$conexion) {
  echo "Error al conectar a la base de datos";
}
?>