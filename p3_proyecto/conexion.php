<?php

// Crear conexión
function conectar_db(){
	$servername = "localhost:3306";
	$username = "root";
	$password = "PepeComePizza-13";
	$dbname = "P3";

	$conn = new mysqli($servername,$username, $password, $dbname);

	// Verificar conexion
	if($conn->connect_error) {
		throw new Exception("Conexion fallida: " . $conn->connect_error);
	}

	return $conn;
}

?>