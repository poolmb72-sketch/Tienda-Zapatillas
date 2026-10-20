<?php
$conexion = new mysqli("127.0.0.1", "zapatillas", "zapatillas123", "tienda_zapatillas");
if ($conexion->connect_error) {
  die("Error de conexion");
}
?>
