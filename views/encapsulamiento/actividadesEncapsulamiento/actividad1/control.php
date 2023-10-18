<?php
include('/php/config.php');

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
    echo "Username: " . $alumnoID . "<br>";
    echo "Servername: " . $servername . "<br>";
    echo "Username: " . $username . "<br>";
    echo "Password: " . $password . "<br>";
    echo "dsssbName: " . $dbname . "<br>";
    echo "ID: " . $alumnoUsername; 
} else {
    header("Location: /index.html");
    exit();  // Asegúrate de salir del script después de la redirección
}


?>
