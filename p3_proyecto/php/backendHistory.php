<?php
include("conexion.php");

$mensaje = "";

// Guardar nuevo libro si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = trim($_POST['Titulo']);
    $fecha = trim($_POST['FechaLectura']);
    $comentario = trim($_POST['Comentario']);

    if ($titulo && $fecha && $comentario) {
        $query_insert = "INSERT INTO Historial (Titulo, FechaLectura, Comentario) 
                         VALUES ('$titulo', '$fecha', '$comentario')";
        mysqli_query($conn, $query_insert);
        $mensaje = "✅ Libro agregado exitosamente.";
    } else {
        $mensaje = "❌ Todos los campos son obligatorios.";
    }
}

// Obtener historial actualizado
$query = "SELECT Titulo, FechaLectura, Comentario FROM Historial ORDER BY FechaLectura DESC";
$resultado = mysqli_query($conn, $query);
?>
