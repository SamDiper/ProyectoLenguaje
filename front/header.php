<?php
include("../bd/conexion.php");
?>

<header class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <div class="text-xl font-bold text-blue-600">
            <a href="index.php">MiniMarket</a>
        </div>

        <nav class="flex items-center gap-4">

            <?php if (isset($_SESSION['user_id'])) { ?>

                <span class="text-gray-700">
                    Hola, <?php echo $_SESSION['nombre']; ?>
                </span>

                <?php if ($_SESSION['rol'] == 1) { ?>
                    <a href="adminPanel.php" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700">
                        Panel Admin
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