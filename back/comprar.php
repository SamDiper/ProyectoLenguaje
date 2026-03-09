<?php
include("../bd/conexion.php");

if(!isset($_SESSION['user_id'])){
    header("Location: ../front/login.php");
    exit();
}

$producto = $_POST['producto_id'];
$user = $_SESSION['user_id'];

$sql = "INSERT INTO ventas(usuario_id,producto_id)
        VALUES(?,?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii",$user,$producto);
$stmt->execute();

header("Location: ../front/index.php?msg=Compra realizada");
?>