<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Préstamos y Devoluciones - Biblioteca Online</title>
    <link rel="stylesheet" href="../css/stylePrestamos.css">
    <link rel="stylesheet" href="../css/styleHeader.css">
<link rel="stylesheet" href="../css/styleDashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/@boxicons/icons@2.1.0/dist/boxicons.min.js"></script>
</head>

<body>
    <header>
        <!-- Contenedor del logo. -->
        <div class="logo"> 
            <a href="index.php">  
            <img src="../img/copiaLOGO.jpeg" alt="Logo de la Biblioteca" class="logo">
            </a>
        </div>

        <div class="navegacion">
            <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="catalogo.php">Library</a></li>
                <li><a href="history.php">History</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
            </ul>
            </nav>
        </div> 

        <!-- Contenido principal del módulo de préstamos -->
        <div class="main-content">
            <h2>Préstamos y Devoluciones</h2>

        <!-- Seleccionar Usuario -->
        <div class="form-group">
            <label for="usuario-select">Selecciona un Usuario</label>
            <select id="usuario-select" onchange="cargarLibros()">
                <option value="">--Seleccionar Usuario--</option>
            </select>
        </div>

            <!-- Libros Disponibles -->
        <div class="form-group">
            <label for="libro-select">Selecciona un Libro</label>
            <select id="libro-select">
                <option value="">--Seleccionar Libro--</option>
            </select>
        </div>

        <button id="prestar-btn" onclick="prestarLibro()">Prestar Libro</button>

            <h3>Libros Prestados</h3>
            <div id="prestados-list">
                <!-- Aquí aparecerán los libros prestados por el usuario -->
            </div>

            <button id="devolver-btn" onclick="devolverLibro()">Devolver Libro</button>

            <div id="mensaje" class="mensaje"></div>
            </div>

    <script src="../js/prestamos.js"></script>
</body>
</html>
