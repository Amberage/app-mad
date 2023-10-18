<?php
include($_SERVER['DOCUMENT_ROOT'] . '/php/config.php');

// Validar que aciertosActividad está seteada y es válida
if (!isset($_POST['aciertosActividad']) || !is_numeric($_POST['aciertosActividad'])) {
    echo "Error: Aciertos de actividad no válidos.";
    exit();
}

$c = (int)$_POST['aciertosActividad'];

// Recuperar datos del usuario
$alumnoID = null;
$alumnoUsername = null;

//Apuntar a la actividad adecuada
$numeroActividad = 1; //Puede ser 1, 2 o 3 segun sea el ccaso
$fechaEntrega = date('Y-m-d H:i:s');

if (isset($_COOKIE['userData'])) {
    // Decodificar y deserializar la información de la cookie
    $userDataJSONEncoded = $_COOKIE['userData'];
    $userDataJSON = base64_decode($userDataJSONEncoded);
    $userData = json_decode($userDataJSON, true); // true para obtener un array asociativo

    // Acceder a 'username' e 'id' almacenados en la cookie
    $alumnoID = $userData['id'];
    $alumnoUsername = $userData['username'];
} else {
    header("Location: /index.html");
    exit();  // Asegúrate de salir del script después de la redirección
}


// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Construir la consulta SQL con sentencias preparadas para prevenir la inyección de SQL
$sql = "UPDATE actividades_Encapsulamiento 
        SET aciertos = ?, actRealizada = 'Si', fechaEntrega = ? 
        WHERE actividadNumero = ? AND idAlumno = ? AND username = ?";

// Preparar la consulta
$stmt = $conn->prepare($sql);

// Verificar si la preparación fue exitosa
if ($stmt === FALSE) {
    die("Error al preparar la consulta: " . $conn->error);
}

// Bindear los parámetros
$stmt->bind_param("isiss", $aciertosActividad, $fechaEntrega, $numeroActividad, $alumnoID, $alumnoUsername);

// Ejecutar la consulta
if ($stmt->execute() === TRUE) {
    echo "Actualización exitosa";
} else {
    echo "Error al actualizar: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
