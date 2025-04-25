<?php
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.php');
    exit();
}

require_once('../includes/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];

    // Update name
    if (isset($_POST['name']) && !empty($_POST['name'])) { 
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $user_id = $_SESSION['user_id'];

    $query = "UPDATE Usuarios SET Nombre = ? WHERE ID_Usuarios = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $name, $user_id);

    if ($stmt->execute()) {
        $errors[] = "Error updating name: "  . $stmt->error;
    } else {
        $_SESSION['name'] = $_POST['name'];
    }
    $stmt->close();
    }

    // Handle profile picture upload
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $filename = $_FILES['profile_picture']['name'];
        $filetype = pathinfo($filename, PATHINFO_EXTENSION);
        
        if (!in_array(strtolower($filetype), $allowed)) {
            $errors[] = "Invalid file type. Allowed types: " . implode(', ', $allowed);
        } else { 
            $upload_path = "../img/user/" . $_SESSION['user_id'] . "." . $filetype;
            if (!move_uploaded_file($_FILES['profile_picture']['tmp_name'], $upload_path)) {
                $errors[] = "Failed to upload profile picture";
            } else {
                $_SESSION['profile_picture'] = $upload_path;
            }
        }
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
    } else {
        $_SESSION['success'] = "Profile updated successfully";
    }

    header('Location: dashboard.php');
    exit();
}

header('Location: dashboard.php');
exit();

