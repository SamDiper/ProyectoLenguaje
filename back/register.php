<?php
include("../bd/conexion.php");

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if($password !== $confirm_password){
    header("Location: ../front/register.php?error=Las contraseñas no coinciden");
    exit();
}
else{
   $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
}

$rol = $_POST['rol'];

$sql = "INSERT INTO usuarios(nombre,email,password,rol_id)
        VALUES(?,?,?,?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi",$nombre,$email,$password,$rol);
$stmt->execute();

header("Location: ../front/login.php?msg=Registro exitoso");