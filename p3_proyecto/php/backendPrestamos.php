<?php 
include 'conexion.php';

$data = json_decode(file_get_contents("php://input"));

$id_usuario = $data->id_usuario;
$id_libro = $data->id_libro;
$metodo_acceso = $data->metodo_acceso;

// Verificar si el libro está disponible
$sql = "SELECT Disponibilidad FROM Libros WHERE ID_Libros = $id_libro";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($row['Disponibilidad'] == 1) {
    // Marcar libro como no disponible
    $updateLibro = "UPDATE Libros SET Disponibilidad = 0 WHERE ID_Libros = $id_libro";
    $conn->query($updateLibro);

    // Registrar el préstamo
    $fecha = date('Y-m-d');
    $sqlPrestamo = "INSERT INTO Prestamos (ID_Usuarios, ID_Libros, Metodo_Acceso, Fecha) 
                    VALUES ($id_usuario, $id_libro, '$metodo_acceso', '$fecha')";
    
    if ($conn->query($sqlPrestamo) === TRUE) {
        echo json_encode(['status' => 'success', 'message' => 'Libro prestado correctamente.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error al registrar el préstamo.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'El libro no está disponible.']);
}

$conn->close();   
?>
