<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "tienda_php";

$conn = new mysqli($host,$user,$password,$db);

if($conn->connect_error){
    die("Error de conexion ".$conn->connect_error);
}

if(!isset($_SESSION)){
    session_start();
}

?>