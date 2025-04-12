<?php
session_start();

function checkLogin() {
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header('Location: ../html/library.php');
        exit();
    }
}


function checkAdmin() {
    checkLogin();
    if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
        header('Location: ../html/dashboard.php');
        exit();
    }
}
?>