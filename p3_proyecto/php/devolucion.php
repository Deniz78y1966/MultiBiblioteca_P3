<?php
include 'conexion.php';

$data = json_decode(file_get_contents("php://input"));

$ID_Usuarios = $data->ID_Usuarios;
$ID_Libros = $data->ID_Libros;

// Verificar si el usuario tiene ese libro prestado
$sql = "SELECT * FROM Prestamos WHERE ID_Usuarios = $ID_Usuarios AND ID_Libros = $ID_Libros AND Fecha IS NULL";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Devolver el libro (marcar libro como disponible)
    $updateLibro = "UPDATE Libros SET Disponibilidad = 1 WHERE ID_Libros = $ID_Libros";
    $conn->query($updateLibro);

    // Actualizar la fecha de devolución
    $fechaDevolucion = date('Y-m-d');
    $updatePrestamo = "UPDATE Prestamos SET Fecha = '$fechaDevolucion' WHERE ID_Usuarios = $ID_Usuarios AND ID_Libros = $ID_Libros";
    $conn->query($updatePrestamo);

    echo json_encode(['status' => 'success', 'message' => 'Libro devuelto correctamente.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'No tienes este libro prestado.']);
}

$conn->close();
?>
