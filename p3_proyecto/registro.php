<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include 'conexion.php';
$message = "";
$conn;

//Procesar el form
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Antes de entrar a SQL debo poner el hash (que hace que la contra sea mas segura).
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    //Inserción a la BD.
    $sql = "INSERT INTO Usuarios (Usuario, Correo, Contrasena) VALUES ('$user', '$email', '$password_hash')";

    $conn = conectar_db();

    if ($conn->query($sql) === TRUE) {
        $message = "Registro exitoso";
    } else { 
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Validación y escape de datos
$user = mysqli_real_escape_string($conn, $user);
$email = mysqli_real_escape_string($conn, $email);

// Validar email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $message = "Email inválido";
    return;
}

// Verificar si el usuario ya existe
$check_user = "SELECT * FROM Usuarios WHERE Usuario = '$user' OR Correo = '$email'";
$result = $conn->query($check_user);
if ($result->num_rows > 0) {
    $message = "Usuario o email ya existe";
    return;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleLogReg.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>    
    <title>Registrar una cuenta</title>
</head>
<body>
    <div class="wrapper">
        <!-- <form action="/registro.html" method="post"> -->
        <form method ="POST" action="registro.php", id="register-form">
            <h1>Registrar una cuenta</h1>
            
            <div class="input-box-reg">
                <input type="text" name="user" placeholder="Nombre de Usuario" required>
                <i class='bx bx-user' ></i>
            </div>
            <div class="input-box-reg">
                <input type="email" name="email" placeholder="Email" required> 
                <i class='bx bx-envelope'></i>
            </div>
            <div class="input-box-reg">
                <input type="password" name="password" placeholder="Ingrese su nueva contraseña" required>
                <i class='bx bx-lock' ></i>
            </div>

            <button type="submit" class="btnReg">Registrarse</button>

            <div class="registro-link">
                <p>Ya tiene cuenta? 
                <a href="login.php">Iniciar sesión</a></p>
            </div>
        </form>

        <?php
            if ($message != "") {
        ?> 
        <p style="text-align: center; color: green;"> <?= $message ?> </p>
        <?php
            }
        ?>

    </div>

</body>
</html>

