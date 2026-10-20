<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
require "../config/db.php";

$datos = json_decode(file_get_contents("php://input"), true);
$cliente = trim($datos["cliente"] ?? "");
$producto_id = (int)($datos["producto_id"] ?? 0);
$talla = (int)($datos["talla"] ?? 0);
$cantidad = (int)($datos["cantidad"] ?? 0);

if ($cliente === "" || $producto_id <= 0 || $talla < 30 || $talla > 48 || $cantidad <= 0) {
  echo json_encode(["ok" => false, "mensaje" => "Datos invalidos"]);
  exit;
}

$stmt = $conexion->prepare("SELECT precio FROM productos WHERE id = ?");
$stmt->bind_param("i", $producto_id);
$stmt->execute();
$fila = $stmt->get_result()->fetch_assoc();

if (!$fila) {
  echo json_encode(["ok" => false, "mensaje" => "Producto no existe"]);
  exit;
}

$total = $fila["precio"] * $cantidad;
$stmt = $conexion->prepare("INSERT INTO pedidos (cliente, producto_id, talla, cantidad, total) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("siiid", $cliente, $producto_id, $talla, $cantidad, $total);
$stmt->execute();

echo json_encode(["ok" => true, "total" => $total]);
?>
