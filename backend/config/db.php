<?php
$conexion = new mysqli("localhost", "root", "", "tienda_zapatillas");
if ($conexion->connect_error) {
  die("Error de conexion");
}
?>
