<?php
include("../bd/conexion.php");

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$rol = 1;

$sql = "INSERT INTO usuarios(nombre,email,password,rol_id)
        VALUES(?,?,?,?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi",$nombre,$email,$password,$rol);
$stmt->execute();

header("Location: ../front/login.php?msg=Registro exitoso");