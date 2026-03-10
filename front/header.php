<?php
include("../bd/conexion.php");
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<header class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <div class="text-xl font-bold text-blue-600">
            <a href="index.php">MiniMarket</a>
        </div>

        <nav class="flex items-center gap-4">

            <?php if (isset($_SESSION['user_id'])) { ?>

                <div class="flex items-center gap-2 bg-gray-100 px-3 py-1.5 rounded-full">
                    <i class="fa-solid fa-user text-gray-600"></i>
                    
                    <span class="text-gray-700 text-sm font-medium">
                        Hola, <?php echo $_SESSION['nombre']; ?>
                    </span>
                </div>

                <?php if ($_SESSION['rol'] == 1) { ?>
                    <a href="adminPanel.php" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700">
                        Panel Admin
                    </a>
                    <a href="historialVentas.php" class="bg-yellow-600 text-white px-4 py-2 rounded-lg hover:bg-yellow-700">
                        Historial de Ventas
                    </a>
                <?php } ?>

                <a href="../back/logout.php" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                    Cerrar sesión
                </a>

            <?php } else { ?>

                <a href="login.php" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Login
                </a>

                <a href="register.php" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                    Register
                </a>

            <?php } ?>

        </nav>

    </div>
</header>