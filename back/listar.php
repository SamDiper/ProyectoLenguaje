<?php
include("../bd/conexion.php");

$sql = "SELECT * FROM productos";

$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->get_result();

$data = [];

while($row = $result->fetch_assoc()){
    $data[] = $row;
}

echo json_encode($data);