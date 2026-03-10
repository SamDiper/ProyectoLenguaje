<?php
include("../bd/conexion.php");

if(!isset($_SESSION['user_id'])){
    header("Location: ../front/login.php");
    exit();
}

$producto = $_POST['producto_id'];
$user = $_SESSION['user_id'];
$cantidad = $_POST['cantidad'];

if($cantidad < 1){
    header("Location: ../front/index.php?error=Cantidad inválida");
    exit();
}

//validar stock
$sql = "SELECT stock FROM productos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i",$producto);
$stmt->execute();
$result = $stmt->get_result();
$productoData = $result->fetch_assoc();

if($productoData['stock'] < $cantidad){
    header("Location: ../front/index.php?error=No hay suficiente stock");
    exit();
}


//hacer compra
$sql = "INSERT INTO ventas(usuario_id,producto_id,cantidad)
        VALUES(?,?,?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("iii",$user,$producto,$cantidad);
$stmt->execute();

//restar stock en productos
$sql = "UPDATE productos
        SET stock = stock - ?
        WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii",$cantidad,$producto);
$stmt->execute();


header("Location: ../front/index.php?msg=Compra realizada");
?>