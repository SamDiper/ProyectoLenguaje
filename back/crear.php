<?php
include("../bd/conexion.php");

if($_SESSION['rol'] != 1){
    die("Acceso denegado");
}

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];

$sql = "INSERT INTO productos(nombre,precio,stock)
        VALUES(?,?,?)";

$stmt = $conn->prepare($sql);
// "sdi" indica que los parámetros son de tipo string, double y integer respectivamente
$stmt->bind_param("sdi",$nombre,$precio,$stock);
$stmt->execute();

header("Location: ../front/adminPanel.php");