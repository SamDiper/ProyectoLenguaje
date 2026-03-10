<?php
include("../bd/conexion.php");

if($_SESSION['rol'] != 1){
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM productos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$producto = $result->fetch_assoc();

if(!$producto){
    die("Producto no encontrado");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Editar Producto</h2>
        <form action="../back/editar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
            <div class="mb-4">
                <label class="block text-gray-700">Nombre</label>
                <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" class="w-full px-3 py-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Precio</label>
                <input type="number" step="0.01" name="precio" value="<?php echo $producto['precio']; ?>" class="w-full px-3 py-2 border rounded-lg" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700">Stock</label>
                <input type="number" name="stock" value="<?php echo $producto['stock']; ?>" class="w-full px-3 py-2 border rounded-lg" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700">Imagen</label>
                <input type="text" name="imagen" value="<?php echo $producto['imagen']; ?>" class="w-full px-3 py-2 border rounded-lg" required>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Actualizar</button>
        </form>
        <a href="adminPanel.php" class="mt-4 block text-center text-blue-600">Volver</a>
    </div>
</body>
</html>