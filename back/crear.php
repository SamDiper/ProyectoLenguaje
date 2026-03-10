<?php
include("../bd/conexion.php");

if($_SESSION['rol'] != 1){
    die("Acceso denegado");
}

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$imagen = $_POST['imagen'];

$sql = "INSERT INTO productos(nombre,precio,stock,imagen)
        VALUES(?,?,?,?)";

$stmt = $conn->prepare($sql);
// "sdis" indica que los parámetros son de tipo string, double y integer respectivamente
$stmt->bind_param("sdis",$nombre,$precio,$stock,$imagen);
$stmt->execute();

header("Location: ../front/adminPanel.php");