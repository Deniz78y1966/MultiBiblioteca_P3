<?php 
    include '../php/sessionChecker.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo BookCloud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styleCatalogo.css">
    <link rel="stylesheet" href="../css/styleHeader.css">
</head>
<body>
    <header>
        <!-- Contenedor del logo. -->
        <div class="logo"> 
            <a href="../index.php">  
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

        <!-- Conditional rendering for buttons or user profile -->
        <?php
        session_start();
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            // Show user profile when logged in
            echo '<div class="user">
                    <img src="../img/user/default.jpeg" alt="foto del usuario">
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
    <!-- Catálogo -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Catálogo de Libros</h2>
        <!-- Barra de Búsqueda -->
        <div class="row mb-4">
            <div class="col-md-4">
                <input type="text" id="searchInput" class="form-control" placeholder="Search by title or author...">
            </div>
            <div class="col-md-4">
                <select id="filterLibrary" class="form-select">
                    <option value="">General Library</option>
                    <option value="Biblioteca Central">Central Library</option>
                    <option value="Biblioteca del Este">East Library</option>
                    <option value="Biblioteca del Norte">North Library</option>
                </select>
            </div>
        </div>

        <!-- Catálogo de Libros -->
        <div class="row" id="bookCatalog">
            <!-- Aquí se cargarán los libros -->
        </div>
    </div>

    <!-- Footer -->
    <footer class style="background-color: lightsalmon; color: black; padding: 2rem;">
        <p>&copy; 2025 | BookCloud. All rights reserved</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script para Catálogo -->
    <script>
        // Catálogo de libros
        const books = [
            // Biblioteca Central
            { title: "Cien Años de Soledad", author: "Gabriel García Márquez", library: "Biblioteca Central" },
            { title: "Don Quijote de la Mancha", author: "Miguel de Cervantes", library: "Biblioteca Central" },
            { title: "El Principito", author: "Antoine de Saint-Exupéry", library: "Biblioteca Central" },
            { title: "Crimen y Castigo", author: "Fiódor Dostoyevski", library: "Biblioteca Central" },
            { title: "La Odisea", author: "Homero", library: "Biblioteca Central" },
            // Biblioteca del Este
            { title: "Orgullo y Prejuicio", author: "Jane Austen", library: "Biblioteca del Este" },
            { title: "1984", author: "George Orwell", library: "Biblioteca del Este" },
            { title: "Matar a un Ruiseñor", author: "Harper Lee", library: "Biblioteca del Este" },
            { title: "La Metamorfosis", author: "Franz Kafka", library: "Biblioteca del Este" },
            { title: "El Gran Gatsby", author: "F. Scott Fitzgerald", library: "Biblioteca del Este" },
            // Biblioteca del Norte
            { title: "Drácula", author: "Bram Stoker", library: "Biblioteca del Norte" },
            { title: "Frankenstein", author: "Mary Shelley", library: "Biblioteca del Norte" },
            { title: "El Retrato de Dorian Gray", author: "Oscar Wilde", library: "Biblioteca del Norte" },
            { title: "El Alquimista", author: "Paulo Coelho", library: "Biblioteca del Norte" },
            { title: "Hamlet", author: "William Shakespeare", library: "Biblioteca del Norte" }
        ];

        // Función para mostrar los libros
        function displayBooks(filteredBooks) {
            const catalog = document.getElementById("bookCatalog");
            catalog.innerHTML = "";
            filteredBooks.forEach(book => {
                catalog.innerHTML += `
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">${book.title}</h5>
                                <p class="card-text">Autor: ${book.author}</p>
                                <p class="card-text"><small class="text-muted">${book.library}</small></p>
                            </div>
                        </div>
                    </div>`;
            });
        }

        // Función para filtrar los libros
        function filterBooks() {
            const searchInput = document.getElementById("searchInput").value.toLowerCase();
            const filterLibrary = document.getElementById("filterLibrary").value;
            const filteredBooks = books.filter(book => {
                const matchesSearch = book.title.toLowerCase().includes(searchInput) || 
                                      book.author.toLowerCase().includes(searchInput);
                const matchesLibrary = filterLibrary === "" || book.library === filterLibrary;
                return matchesSearch && matchesLibrary;
            });
            displayBooks(filteredBooks);
        }

        // Event Listeners
        document.getElementById("searchInput").addEventListener("input", filterBooks);
        document.getElementById("filterLibrary").addEventListener("change", filterBooks);

        // Cargar todos los libros al cargar la página
        window.onload = () => displayBooks(books);
    </script>
</body>
</html>
