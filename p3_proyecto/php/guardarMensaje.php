<?php
session_start();
include('db_connection.php');

if (isset($_POST['message']) && !empty($_POST['message'])) {
    $message = htmlspecialchars($_POST['Mensaje']);
    $user_id = $_SESSION['ID_Chat'];

    $stmt = $pdo->prepare("INSERT INTO Chat (ID_Chat, Mensaje, created_at) VALUES (?, ?, NOW())");
    $stmt->execute([$user_id, $message]);
}
?>