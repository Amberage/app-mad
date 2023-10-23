<?php
include($_SERVER['DOCUMENT_ROOT'] . '/php/config.php');

// Recuperar datos del usuario
$alumnoID = null;
$alumnoUsername = null;

if (isset($_COOKIE['userData'])) {
    // Decodificar y deserializar la información de la cookie
    $userDataJSONEncoded = $_COOKIE['userData'];
    $userDataJSON = base64_decode($userDataJSONEncoded);
    $userData = json_decode($userDataJSON, true); // true para obtener un array asociativo

    // Acceder a 'username' e 'id' almacenados en la cookie
    $alumnoID = $userData['id'];
    $alumnoUsername = $userData['username'];
} else {
    header("Location: ../index.html");
    exit();  // Asegúrate de salir del script después de la redirección
}

// Establecer la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si hay errores de conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Escapar y sanitizar las variables para evitar inyección SQL
$alumnoID = $conn->real_escape_string($alumnoID);
$alumnoUsername = $conn->real_escape_string($alumnoUsername);

// Realizar la consulta SQL
$sql = "UPDATE actividades_Herencia
        SET aciertos = NULL, actRealizada = 'No', fechaEntrega = '2023-10-15 18:46:53'
        WHERE idAlumno = '$alumnoID' AND username = '$alumnoUsername'";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['resultadoSQL' => 'Actividades de herencia reiniciadas para el usuario: ' . $alumnoUsername]); 
} else {
    $message = "Error al actualizar el registro: " . $conn->error;
}

// Cerrar la conexión
$conn->close();

// Redireccionar después de la operación de base de datos

exit();  // Asegúrate de salir del script después de la redirección
?>
