<?php 
    include '../php/sessionChecker.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleLibrary.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <title>library</title>
</head>
<body>
        <!-- Navigation bar code -->
        <header>
        <!-- Contenedor del logo. -->
        <div class="logo">
            <a href="../index.php#Settings">
                <img src="../img/copiaLOGO.jpeg" alt="Logo de la Biblioteca" class="logo">
            </a>
        </div>

        <!-- Contenedor para los enlaces de navegacion del sitio. -->
        <div class="navegacion">
            <nav>
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="library.php">Library</a></li>
                    <li><a href="#">History</a></li>
                    <li><a href="dashboard.php">Dashboard</a></li>
                </ul>
            </nav>
        </div>

        <!-- User tag in the header -->
        <div class="user">
            <a href="dashboard.php#settings">
                <img src="../img/user/default.jpeg" alt="foto del usuario">
            </a>
        </div>
    </header>

</body>
</html>