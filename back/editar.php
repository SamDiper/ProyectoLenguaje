<?php
include("../bd/conexion.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$imagen = $_POST['imagen'];


$sql = "UPDATE productos
        SET nombre = ?, precio = ?, stock = ?, imagen = ?
        WHERE id = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("sdisi", $nombre, $precio, $stock, $imagen, $id);

$stmt->execute();

$stmt->close();
$conn->close();

header("Location: ../front/adminPanel.php");
?>