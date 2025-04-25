<?php
include 'conexion.php';

$sql = "SELECT ID_Libros, Titulo, Autor FROM Libros WHERE Disponibilidad = 1";  // Solo los libros disponibles
$result = $conn->query($sql);

$libros = [];
while ($row = $result->fetch_assoc()) {
    $libros[] = $row;
}

echo json_encode($libros);

$conn->close();
?>
