<?php
$conexion = new mysqli("localhost", "zapatillas", "zapatillas123", "tienda_zapatillas");
if ($conexion->connect_error) {
  die("Error de conexion");
}
?>
