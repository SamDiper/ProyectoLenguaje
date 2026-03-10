<?php
include("../bd/conexion.php");

if($_SESSION['rol'] != 1){
    header("Location: index.php");
    exit();
}

$sql = "SELECT * FROM productos";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<?php include("header.php"); ?>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-7xl mx-auto p-6">
        <h2 class="text-3xl font-bold mb-8">Panel de Administración</h2>

        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
            <h3 class="text-xl font-semibold mb-4">Agregar Producto</h3>
            <form action="../back/crear.php" method="POST">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <input type="text" name="nombre" placeholder="Nombre" class="px-3 py-2 border rounded-lg" required>
                    <input type="number" step="0.01" name="precio" placeholder="Precio" class="px-3 py-2 border rounded-lg" required>
                    <input type="number" name="stock" placeholder="Stock" class="px-3 py-2 border rounded-lg" required>
                    <input type="text" name="imagen" placeholder="URL de la imagen" class="px-3 py-2 border rounded-lg" required>

                </div>
                <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Agregar</button>
            </form>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold mb-4">Productos</h3>
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Imagen</th>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Precio</th>
                        <th class="px-4 py-2">Stock</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($p = $result->fetch_assoc()) { ?>
                    <tr>
                        <td class="border px-4 py-2 flex justify-center"><img src="<?php echo $p['imagen']; ?>" alt="<?php echo $p['nombre']; ?>" class="w-16 h-16 object-cover rounded"></td>
                        <td class="border px-4 py-2"><?php echo $p['id']; ?></td>
                        <td class="border px-4 py-2"><?php echo $p['nombre']; ?></td>
                        <td class="border px-4 py-2">$<?php echo number_format($p['precio'],2); ?></td>
                        <td class="border px-4 py-2"><?php echo $p['stock']; ?></td>
                        <td class="border px-4 py-2">
                            <a href="editar.php?id=<?php echo $p['id']; ?>" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Editar</a>
                            <a href="../back/eliminar.php?id=<?php echo $p['id']; ?>" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 ml-2" onclick="return confirm('¿Eliminar?')">Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>