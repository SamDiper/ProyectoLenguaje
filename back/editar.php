<?php
include("../bd/conexion.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];

$sql = "UPDATE productos
        SET nombre = ?, precio = ?, stock = ?
        WHERE id = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("sdii", $nombre, $precio, $stock, $id);

$stmt->execute();

$stmt->close();
$conn->close();

header("Location: ../front/adminPanel.php");
?>