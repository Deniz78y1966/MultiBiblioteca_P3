
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleLogReg.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <title>Log In</title>

    <script>
        // Función para obtener datos de la base de datos
        function obtenerDatos() {
            fetch('login.php') 
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
    </script>   

</head>
<body>
    
    <div class="wrapper">
        <form id="login-form" method="POST" action="login.php" >
            <h1>Iniciar sesión</h1>

            <div class="input-box-log">
                <input type="text" placeholder="Nombre de usuario" required>
                <i class='bx bx-user' ></i>
            </div>
            <div class="input-box-log">
                <input type="password" placeholder="Contraseña" required>
                <i class="bx bx-user"></i>
            </div>
            <div class="recordar-olvidar">
                <label><input type="checkbox">Recuérdame</label>
                <a href="#">Contraseña olvidada?</a>
            </div>

            <button type="submit" class="btnLog">Iniciar sesión</button>   

            <div class="registro-link">
                <p>No tiene cuenta?
                <a href="registro.php'">Registrar</a></p>
            </div>
        </form>
    </div>

</body>
</html>


<?php   
session_start();
$message = "";

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "PepeComePizza-13";
$dbname = "P3";

// Creando la conexión.
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar el form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
}

$sql = "SELECT * FROM Usuarios WHERE username='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['username'] = $user;
    header("Location: index.php"); //Esta es la parte que lo redirecciona al main(index).
    exit();
} else {
    header("Location: login.php");
}

$conn->close();
?> 
