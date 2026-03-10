<?php
include("../bd/conexion.php");

$sql = "SELECT ventas.id, usuarios.nombre AS usuario, productos.nombre AS producto, productos.precio AS precio, ventas.cantidad, ventas.fecha FROM ventas INNER JOIN usuarios ON ventas.usuario_id = usuarios.id INNER JOIN productos ON ventas.producto_id = productos.id;";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Ventas</title>
</head>
<body>
    <h1>Historial de Ventas</h1>
    <table border="1">
        <tr>
            <th>ID Venta</th>
            <th>Usuario</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Total</th>
            <th>Fecha</th>
        </tr>
        <?php while($venta = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $venta['id']; ?></td>
            <td><?php echo $venta['usuario']; ?></td>
            <td><?php echo $venta['producto']; ?></td>
            <td><?php echo $venta['cantidad']; ?></td>
            <td><?php echo number_format($venta['precio'] * $venta['cantidad'], 2); ?>$</td>
            <td><?php echo $venta['fecha']; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>