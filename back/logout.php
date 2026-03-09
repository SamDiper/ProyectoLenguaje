<?php
include("../bd/conexion.php");

session_destroy();

header("Location: ../front/index.php");
?>