<?php
/* include $_SERVER['DOCUMENT_ROOT'] . '/php/config.php'; */

$servername = "localhost";
$username = "amberage_root";
$password = "Q2om%)?H.sAQV(r(MD";
$dbname = "amberage_madness";

// recuperar datos del usuario
if (isset($_COOKIE['userData'])) {
    // Decodifica y deserializa la información de la cookie
    $userDataJSONEncoded = $_COOKIE['userData'];
    $userDataJSON = base64_decode($userDataJSONEncoded);
    $userData = json_decode($userDataJSON, true); // true para obtener un array asociativo

    // Ahora puedes acceder a 'username' e 'id' almacenados en la cookie
    $alumnoID = $userData['id'];
    $alumnoUsername = $userData['username'];

    // Puedes usar estas variables como necesites en tu código
    echo "Username: " . $usernameFromCookie . "<br>";
    echo "ID: " . $idFromCookie;
} else {
    header("Location: " . $_SERVER['DOCUMENT_ROOT'] . "/index.html");
    exit();  // Asegúrate de salir del script después de la redirección
}


?>
