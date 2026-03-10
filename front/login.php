<?php
include("../bd/conexion.php");

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <style>

        body{
            margin:0;
            padding:0;
            font-family:'Segoe UI', sans-serif;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .login-box{
            background:white;
            padding:40px;
            width:350px;
            border-radius:15px;
            box-shadow:0 15px 25px rgba(0,0,0,0.2);
            text-align:center;
        }

        .login-box h2{
            margin-bottom:30px;
            color:#333;
        }

        .input-box{
            margin-bottom:20px;
            text-align:left;
        }

        .input-box label{
            font-size:14px;
            color:#555;
        }

        .input-box input{
            width:100%;
            padding:10px;
            margin-top:5px;
            border:none;
            border-bottom:2px solid #ccc;
            outline:none;
            transition:0.3s;
        }

        .input-box input:focus{
            border-bottom:2px solid #764ba2;
        }

        .btn{
            width:100%;
            padding:12px;
            background:#764ba2;
            border:none;
            color:white;
            font-size:16px;
            border-radius:8px;
            cursor:pointer;
            transition:0.3s;
        }

        .btn:hover{
            background:#667eea;
        }

        .error{
            color:red;
            margin-bottom:15px;
            font-size:14px;
        }

        .success{
            color:green;
            margin-bottom:15px;
            font-size:14px;
        }

        .register-link{
            margin-top:15px;
            font-size:14px;
        }

        .register-link a{
            color:#764ba2;
            text-decoration:none;
            font-weight:500;
        }

        .register-link a:hover{
            text-decoration:underline;
        }

    </style>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>

<div class="login-box">

    <h2>Iniciar Sesión</h2>

    <?php if (isset($_GET['error'])) { ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?php echo $_GET['error']; ?>
            </div>
    <?php } ?>

    <?php if (isset($_GET['msg'])) { ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            <?php echo $_GET['msg']; ?>
        </div>
    <?php } ?>

    <form action="../back/login.php" method="POST">

        <div class="input-box">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="input-box">
            <label>Contraseña</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit" class="btn">
            Entrar
        </button>

    </form>

    <div class="register-link">
        ¿No tienes cuenta?
        <a href="register.php">Regístrate</a>
    </div>

</div>

</body>
</html>