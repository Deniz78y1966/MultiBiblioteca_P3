<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Estilos del navbar */
        .navbar {
            overflow: hidden;
            background-color: #333;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .navbar .icon {
            display: none; /* Ocultar el icono por defecto */
        }

        /* Estilos para pantallas pequeñas */
        @media screen and (max-width: 600px) {
            .navbar a:not(:first-child) { display: none; } /* Ocultar enlaces excepto el primero */
            .navbar a.icon {
                float: right;
                display: block; /* Mostrar el icono en pantallas pequeñas */
            }
        }

        /* Estilos para el menú responsivo */
        @media screen and (max-width: 600px) {
            .navbar.responsive { position: relative; }
            .navbar.responsive .icon {
                position: absolute;
                right: 0;
                top: 0;
            }
            .navbar.responsive a {
                float: none;
                display: block; /* Mostrar enlaces en bloque */
                text-align: left; /* Alinear texto a la izquierda */
            }
        }
    </style>

</head>
<body>

        <div class="navbar" id="theNavbar">
            <a href="index.php">Home</a>
            <a href="#">Library</a>
            <a href="#">History</a>
            <a href="dashboard.php">Dashboard</a>
            <a href="javascript:void(0);" class="icon" onclick="toggleNavbar()">
                &#9776; <!-- Icono de menú (hamburguesa) -->
            </a>

    <script>
        function toggleNavbar() {
            var navbar = document.getElementById("myNavbar");
            if (navbar.className === "navbar") {
                navbar.className += " responsive"; // Agregar clase 'responsive'
            } else {
                navbar.className = "navbar"; // Remover clase 'responsive'
            }
        }
    </script>

</body>
</html>






