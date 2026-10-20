<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
require "../config/db.php";

$resultado = $conexion->query("SELECT * FROM productos");
echo json_encode($resultado->fetch_all(MYSQLI_ASSOC));
?>
