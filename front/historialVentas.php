<?php
include("../bd/conexion.php");

$sql = "
    SELECT 
        ventas.id,
        usuarios.nombre AS usuario,
        productos.nombre AS producto,
        productos.precio AS precio,
        ventas.cantidad,
        ventas.fecha
    FROM ventas
    INNER JOIN usuarios 
        ON ventas.usuario_id = usuarios.id
    INNER JOIN productos 
        ON ventas.producto_id = productos.id
";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Ventas</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

<?php include("header.php"); ?>

<div class="max-w-6xl mx-auto p-6">

    <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">
        Historial de Ventas
    </h1>

    <div class="bg-white rounded-xl shadow-md overflow-hidden">

        <table class="w-full text-left">

            <thead class="bg-gray-200 text-gray-700 uppercase text-sm">
                <tr>
                    <th class="px-6 py-3">ID Venta</th>
                    <th class="px-6 py-3">Usuario</th>
                    <th class="px-6 py-3">Producto</th>
                    <th class="px-6 py-3">Cantidad</th>
                    <th class="px-6 py-3">Precio Total</th>
                    <th class="px-6 py-3">Fecha</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                <?php while ($venta = $result->fetch_assoc()) { ?>

                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-6 py-4 font-semibold text-gray-700">
                            <?php echo $venta['id']; ?>
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            <?php echo $venta['usuario']; ?>
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            <?php echo $venta['producto']; ?>
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            <?php echo $venta['cantidad']; ?>
                        </td>

                        <td class="px-6 py-4 font-bold text-green-600">
                            $ <?php echo number_format($venta['precio'] * $venta['cantidad'], 0, ",", "."); ?>
                        </td>

                        <td class="px-6 py-4 text-gray-500">
                            <?php echo $venta['fecha']; ?>
                        </td>

                    </tr>

                <?php } ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>