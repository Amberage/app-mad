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
    header("Location: /index.html");
    exit();  // Asegúrate de salir del script después de la redirección
}

// Realizar la consulta SQL
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La conexión a la base de datos ha fallado: " . $conn->connect_error);
}

$sql = "SELECT aciertos, actRealizada, fechaEntrega FROM actividades_Encapsulamiento WHERE username = '$alumnoUsername' AND actividadNumero = 3";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Procesar los resultados de la consulta
    while ($row = $result->fetch_assoc()) {
        // Guardar los datos en variables
        $aciertos = $row['aciertos'];
        $actRealizada = $row['actRealizada'];
        $fechaEntrega = $row['fechaEntrega'];
    }
} else {
    echo "No se encontraron resultados para la actividad número 1 y el usuario '$alumnoUsername'";
    exit();
}

$conn->close();

// Crear un array asociativo con las variables
$actData = array(
    'aciertos' => $aciertos,
    'actRealizada' => $actRealizada,
    'fechaEntrega' => $fechaEntrega,
    'alumnoID' => $alumnoID,
    'alumnoUsername' => $alumnoUsername
);

// Convertir el array a formato JSON
echo json_encode($actData);
?>