<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="styleMain.css">
    <link rel="stylesheet" href="~/lib/bootstrap/dist/css/bootstrap.min.css" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Sistema Bibliotecario</title>

    <!-- <script>
        // Función para obtener datos de la base de datos
        function obtenerDatos() {
            fetch('conexion.php') 
                .then(response => response.json())
                .then(data => {
                    // Procesar los datos recibidos
                    let output = ' ';
                    data.forEach(item => {
                        output += `<p>ID: ${item.ID_Usuarios} - Nombre: ${item.Nombre}</p>`;
                    });
                    document.getElementById('resultado').innerHTML = output;
                })
                .catch(error => console.error('Error:', error));
        }
                // Llamar a la función al cargar la página
                window.onload = obtenerDatos;
    </script> -->

</head>

<body>
 
    <header>
        <!-- Contenedor del logo. -->
        <div class="logo"> 
            <a href="index.php">  
            <img src="imgP3/copiaLOGO.jpeg" alt="Logo de la Biblioteca" class="logo">
            </a>
        </div>

        <!-- Contenedor para los enlaces de navegacion del sitio. -->
        <div class="navegacion">
            <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Library</a></li>
                <li><a href="#">History</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
            </ul>
            </nav>
        </div> 

        <!-- User tag in the navbar -->
        <!-- <div class="user">
            <img src="imgP3/userProfile.jpeg" alt="foto del usuario">
        </div> -->

        <!-- Contenedor de los botones: inicio sesion y crear cuenta. -->
        <div class="botones">        
            <button class="btn" style="background-color: lightsalmon; color: dark; border: none;" onclick="location.href='login.php'">Log In</button>   
            <button class="btn" style="background-color: lightsalmon; color: dark; border: none;" onclick="location.href='registro.php'">Register</button>
        </div>

    </header>

    <!-- Main para el título principal. -->
    <main class="container-text-center mt-5">
        <h1>Welcome to BookCloud</h1>
        <p>Save your favorites books from your favorite bookshop</p>
    </main>

        <!-- Sección Hero con el slider -->
        <div id="heroCarousel" class="carousel slide hero" data-ride="carousel">
            <div class="carousel-inner">
                    <!-- Primer libro: El Principito -->
                <div class="carousel-item active">
                    <img src="imgP3/principito.jpg" class="d-block w-100" alt="El Principito">
                    <div class="carousel-caption">
                        <h5>El Principito</h5>
                        <p>Antoine de Saint-Exupéry</p>
                    </div>
                </div>
                    <!-- Segundo libro: 1984 -->
                <div class="carousel-item">
                    <img src="imgP3/georgeorwell.jpg" class="d-block w-100" alt="1984">
                    <div class="carousel-caption">
                        <h5>1984</h5>
                        <p>George Orwell</p>
                    </div>
                </div>
                   <!-- Tercer libro: Cien Años de Soledad -->
               <div class="carousel-item">
                   <img src="imgP3/gabrielgarciamarquez.GIF" class="d-block w-100" alt="Cien Años de Soledad">
                   <div class="carousel-caption" style="color: white; background-color: brown;">
                       <h5>Cien Años de Soledad</h5>
                       <p>Gabriel García Márquez</p>
                   </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>

            <!-- Sección Beneficios; Final de página -->
     <section class="benefits container text-center mt-5">
        <h2>¿Por qué usar BookCloud?</h2>
        <div class="row">
            <div class="col-md-3">
                <i class="fas fa-book fa-3x"></i>
                <h4>Acceso ilimitado</h4>
                <p>Reserva cualquier libro de nuestra multibiblioteca digital.</p>
            </div>
            <div class="col-md-3">
                <i class="fas fa-rocket fa-3x"></i>
                <h4>Rápido y fácil</h4>
                <p>Encuentra y reserva libros en pocos clicks.</p>
            </div>
            <div class="col-md-3">
                <i class="fas fa-globe fa-3x"></i>
                <h4>Desde cualquier lugar</h4>
                <p>Accede a las bibliotecas desde cualquier dispositivo.</p>
            </div>
            <div class="col-md-3">
                <i class="fas fa-search fa-3x"></i>
                <h4>Búsqueda avanzada</h4>
                <p>Filtra libros por categoría, autor o título.</p>
            </div>
        </div>
    </section>

      <!-- Sección Beneficios; Final de página -->
      <footer class="bg-lightsalmon text-dark text-center">
         <p>&copy; 2025 | BookCloud. Todos los derechos reservados</p>
      </footer> 

</body>
</html>

<?php
include 'conexion.php';
?>