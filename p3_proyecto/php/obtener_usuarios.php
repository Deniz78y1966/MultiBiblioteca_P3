<?php
include 'conexion.php';

$sql = "SELECT ID_Usuarios, Nombre FROM Usuarios";
$result = $conn->query($sql);

$usuarios = [];
while ($row = $result->fetch_assoc()) {
    $usuarios[] = $row;
}

echo json_encode($usuarios);

$conn->close();
?>
