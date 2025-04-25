<?php
session_start();
// Verifica que el usuario esté logueado
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Chat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styleChat.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>

<body>
    <?php include('header.php') ?>

    <div class="container chat-container">
        <div class="chat-box" id="chat-box">
        </div>
        <form id="chat-form" method="post">
            <input type="text" id="message" name="message" class="form-control" placeholder="Escribe un mensaje..."
                required>
            <button type="submit" class="btn btn-primary mt-2">Enviar</button>
        </form>
    </div>

    <script src="../js/chat.js"></script>
</body>

</html>