<?php
include("../bd/conexion.php");

$sql = "SELECT * FROM productos";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Tienda</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

<?php include("header.php"); ?>

<div class="max-w-7xl mx-auto p-6">

    <h2 class="text-3xl font-bold mb-8 text-center">
        Productos de la Canasta Familiar
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

        <?php while ($p = $result->fetch_assoc()) { ?>

            <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition overflow-hidden">

                <img src="<?php echo $p['imagen']; ?>" class="w-full h-40 object-cover">

                <div class="p-4">

                    <h3 class="text-lg font-semibold mb-2">
                        <?php echo $p['nombre']; ?>
                    </h3>

                    <p class="text-green-600 font-bold text-lg mb-4">
                        $ <?php echo number_format($p['precio'], 0, ",", "."); ?>
                    </p>

                    <?php if (isset($_SESSION['user_id'])) { ?>

                        <form action="../back/comprar.php" method="POST">

                            <input
                                type="hidden"
                                name="producto_id"
                                value="<?php echo $p['id']; ?>"
                            >

                            <button
                                type="submit"
                                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition"
                            >
                                Comprar
                            </button>

                        </form>

                    <?php } else { ?>

                        <p class="text-sm text-gray-500">
                            Inicia sesión para comprar
                        </p>

                    <?php } ?>

                </div>

            </div>

        <?php } ?>

    </div>

</div>

</body>
</html>