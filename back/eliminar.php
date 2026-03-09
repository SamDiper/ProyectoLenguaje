<?php
include("../bd/conexion.php");

$id = $_GET['id'];

$sql = "DELETE FROM productos WHERE id = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $id);

$stmt->execute();

$stmt->close();
$conn->close();

header("Location: ../front/adminPanel.php");
?>