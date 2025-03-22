<?php
session_start();

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "PepeComePizza-13", "P3");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT id, username, profile_image FROM usuarios WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];

    echo json_encode([
        'success' => true,
        'profileImage' => $user['profile_image']
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid credentials'
    ]);
}

$stmt->close();
$conn->close();
?>