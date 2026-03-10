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
    <?php if (isset($_GET['msg'])) { ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            <?php echo $_GET['msg']; ?>
        </div>
    <?php } ?>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

        <?php while ($p = $result->fetch_assoc()) { ?>

        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition overflow-hidden">

            <img 
                src="<?php echo $p['imagen']; ?>" 
                class="w-full h-40 object-cover <?php if($p['stock'] == 0) echo 'grayscale opacity-60'; ?>"
            >

            <div class="p-4">

                <h3 class="text-lg font-semibold mb-2">
                    <?php echo $p['nombre']; ?>
                </h3>

                <p class="font-bold text-lg mb-2 <?php 
                    if($p['stock'] == 0){
                        echo "text-gray-400";
                    }else{
                        echo "text-green-600";
                    }
                ?>"
                >
                    $ <?php echo number_format($p['precio'], 0, ",", "."); ?>
                    
                </p>

                <p class="text-sm mb-4 <?php echo $p['stock'] == 0 ? 'text-red-500 font-semibold' : 'text-gray-600'; ?>">
                    Stock: <?php echo $p['stock']; ?>
                </p>

                <?php if (isset($_SESSION['user_id'])) { ?>

                    <form action="../back/comprar.php" method="POST">

                        <input
                            type="hidden"
                            name="producto_id"
                            value="<?php echo $p['id']; ?>"
                        >

                        <input
                            type="number"
                            name="cantidad"
                            value="1"
                            min="1"
                            max="<?php echo $p['stock']; ?>"
                            class="w-full mb-4 px-3 py-2 border rounded-lg"
                            <?php if($p['stock'] == 0) echo "disabled"; ?>
                            required
                        >

                        <button
                            type="submit"
                            class="w-full py-2 rounded-lg transition
                            <?php 
                                if($p['stock'] == 0){
                                    echo "bg-gray-400 cursor-not-allowed";
                                }else{
                                    echo "bg-blue-600 text-white hover:bg-blue-700";
                                }
                            ?>"
                            <?php if($p['stock'] == 0) echo "disabled"; ?>
                        >
                            <?php echo $p['stock'] == 0 ? "Agotado" : "Comprar"; ?>
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