<?php
include("../bd/conexion.php");

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE email = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s",$email);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if($user && password_verify($password,$user['password'])){

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['rol'] = $user['rol_id'];
    $_SESSION['nombre'] = $user['nombre'];

    header("Location: ../front/index.php");
}else{
    header("Location: ../front/login.php?error=Credenciales incorrectas");
}
?>