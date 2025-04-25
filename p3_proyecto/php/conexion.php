<?php
// Crear conexión
function conectar_db(){
	$servername = "localhost"; 
	$username = "root"; 
	$password = ""; 
	$dbname = "P3"; 

	try {
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Verificar conexion
		if($conn->connect_error){
			die("Conexion fallida: " . $conn->connect_error);
		}
		return $conn;
	} catch (Exception $e) {
		die("Conexion fallida: " . $e->getMessage());
	}
}

// Creando cuenta admin
function crearAdmin($conn){
$admin_user = 'ElAdmin';
$admin_password = 'ManiPulanDo12';
$hashed_password = password_hash($admin_password, PASSWORD_DEFAULT);
$rol = 'admin';  // Esta es la variable local en la función

$sql = "INSERT INTO Usuarios (Usuario, Contrasena, Rol) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $admin_user, $hashed_password, $rol);

	if ($stmt->execute()){
		echo "New admin account created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

$conn = conectar_db();
$check = $conn->query("SELECT * FROM Usuarios WHERE Usuario = 'ElAdmin'");
if ($check->num_rows == 0) {
    crearAdmin($conn);
}

$conn->close();

?>