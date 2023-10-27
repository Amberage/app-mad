<?php
include 'config.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(array("error" => true, "message" => "Muerte 1"));
    die(json_encode(array("error" => true, "message" => "Error de conexión: " . $conn->connect_error)));
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashedPassword = $row['password'];
    $tipoCuenta = $row['userType'];

    // Obtén la IP del usuario
    $ip = $_SERVER['REMOTE_ADDR'];

    // Suponiendo que $userData es un array con los datos del usuario que quieres almacenar en la cookie
    $userData = array(
        "id" => $row['id'],
        "username" => $row['username'],
        "nombre" => $row['nombre'],
        "aPaterno" => $row['aPaterno'],
        "aMaterno" => $row['aMaterno'],
        "correo" => $row['correo'],
        "userType" => $row['userType'],
        "ip" => $ip,
        "fechaRegistro" => $row['fechaRegistro']
    );

    // Convertir el array a JSON y codificar para que sea seguro para las cookies
    $userDataJSON = json_encode($userData);
    $userDataJSONEncoded = base64_encode($userDataJSON);

    // Establecer la cookie con la información del usuario
    setcookie("userData", $userDataJSONEncoded, time() + (3600), "/"); 

    // Verificar la contraseña proporcionada con la contraseña encriptada
    if (password_verify($password, $hashedPassword) && $tipoCuenta == 'alumno') {
        // Contraseña válida, inicio de sesión exitoso
        echo json_encode(array("error" => false, "message" => "Inicio de sesión exitoso", "redirect" => "home.html"));
    } else if (password_verify($password, $hashedPassword) && $tipoCuenta == 'docente'){
        echo json_encode(array("error" => false, "message" => "Inicio de sesión exitoso", "redirect" => "/views/admin/docente.html"));
    } else if (password_verify($password, $hashedPassword) && $tipoCuenta == 'administrador'){
        echo json_encode(array("error" => false, "message" => "Inicio de sesión exitoso", "redirect" => "/views/admin/admin.php"));
    } else {
        // Contraseña incorrecta
        echo json_encode(array("error" => true, "message" => "Contraseña Incorrecta", "redirect" => "/views/login.html"));
    }
} else {
    // Usuario no encontrado
    setcookie("userData", "", time() - 3600, "/");
    echo json_encode(array("error" => true, "message" => "Usuario inexistente"));
}

$conn->close();
?>
