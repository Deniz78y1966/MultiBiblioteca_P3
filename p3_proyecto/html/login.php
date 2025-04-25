<?php   
session_start();

include '../php/conexion.php';
include '../php/sessionChecker.php';

$response = array('success' => false, 'message' => '', 'rol' => '', 'username' => '');
$conn = conectar_db();

// Procesar el form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['user'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Usuarios WHERE Usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['Contrasena'])) {
            $_SESSION['user_id'] = $user['ID'];
            $_SESSION['user_name'] = $user['Usuario'];
            $_SESSION['rol'] = $user['Rol'];
            $_SESSION['logged_in'] = true;
            
            $response['success'] = true;
            $response['rol'] = $user['Rol'];
            $response['username'] = $user['usuario'];
            
            header('Content-Type: application/json');
            echo json_encode($response);
            exit();
        } else {
            $response['message'] = "Contraseña incorrecta";
        }
    } else {
        $response['message'] = "Usuario no encontrado";
    }
    
    // If we get here, login failed
    if ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en"> 

<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="../css/styleLogReg.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="../js/scriptLogin.js"></script>
    <title>Log In</title>

    <style>
        body { background-color: #1f293a !important; }
    </style>
</head>

<body>
    <div class="wrapper">
        <form id="login-form" method="POST" action="login.php">
            <h1>Iniciar sesión</h1>
            <?php if (!empty($message)): ?>
                    <div class="error-message"><?php echo htmlspecialchars($message); ?></div>
            <?php endif; ?>
            <div class="input-box-log">
                <input type="text" name="user" placeholder="Nombre de usuario" required>
                <i class="bx bx-user"></i>
            </div>
            <div class="input-box-log">
                <input type="password" name="password" placeholder="Contraseña" required>
                <i class='bx bx-lock-alt'></i> 
            </div>
            <div class="recordar-olvidar">
                <label>
                    <input type="checkbox">Recuérdame</input>
                </label>
                <a href="#">Contraseña olvidada?</a>
            </div>
                <button type="submit" class="btnLog">Iniciar sesión</button></a>
            <div class="registro-link">
                <p>No tiene cuenta?
                    <a href="registro.php">Registrar</a>
                </p>
            </div>
        </form>
    </div>   
</body>
</html>


