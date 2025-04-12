<?php
include 'php/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery first, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/styleIndex.css">
    <title>Sistema Bibliotecario</title>
</head>

<body>
 
    <header>
        <!-- Contenedor del logo. -->
        <div class="logo"> 
            <a href="index.php">  
            <img src="img/copiaLOGO.jpeg" alt="Logo de la Biblioteca" class="logo">
            </a>
        </div>

        <!-- Contenedor para los enlaces de navegacion del sitio. -->
        <div class="navegacion">
            <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="html/library.php">Library</a></li>
                <li><a href="#">History</a></li>
                <li><a href="html/dashboard.php">Dashboard</a></li>
            </ul>
            </nav>
        </div> 

        <!-- Conditional rendering for buttons or user profile -->
        <?php
        session_start();
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            // Show user profile when logged in
            echo '<div class="user">
                    <img src="img/user/default.jpeg" alt="foto del usuario">
                  </div>';
        } else {
            // Show login/register buttons when not logged in
            echo '<div class="botones">        
                    <button class="btn" style="background-color: lightsalmon; color: dark; border: none;" onclick="location.href=\'html/login.php\'">Log In</button>   
                    <button class="btn" style="background-color: lightsalmon; color: dark; border: none;" onclick="location.href=\'html/registro.php\'">Register</button>
                  </div>';
        }
        ?>

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
                    <img src="img/carousel/principito.jpeg" class="d-block w-100" alt="El Principito">
                    <div class="carousel-caption">
                        <h5>El Principito</h5>
                        <p>Antoine de Saint-Exupéry</p>
                    </div>
                </div>
                    <!-- Segundo libro: 1984 -->
                <div class="carousel-item">
                    <img src="img/carousel/georgeorwell.jpeg" class="d-block w-100" alt="1984">
                    <div class="carousel-caption">
                        <h5>1984</h5>
                        <p>George Orwell</p>
                    </div>
                </div>
                   <!-- Tercer libro: Cien Años de Soledad -->
               <div class="carousel-item">
                   <img src="img/carousel/gabrielgarciamarquez.jpeg" class="d-block w-100" alt="Cien Años de Soledad">
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

