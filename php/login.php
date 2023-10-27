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

    if (password_verify($password, $hashedPassword)) {
        $ip = $_SERVER['REMOTE_ADDR'];

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

        $userDataJSON = json_encode($userData);
        $userDataJSONEncoded = base64_encode($userDataJSON);

        $redirectPath = "";

        if ($tipoCuenta == 'alumno') {
            $redirectPath = "home.html";
        } elseif ($tipoCuenta == 'docente') {
            $redirectPath = "/views/admin/docente.html";
        } elseif ($tipoCuenta == 'administrador') {
            $redirectPath = "/views/admin/admin.php";
        }

        setcookie("userData", $userDataJSONEncoded, time() + (3600), "/");
        echo json_encode(array("error" => false, "message" => "Inicio de sesión exitoso", "redirect" => $redirectPath));
    } else {
        echo json_encode(array("error" => true, "message" => "Contraseña Incorrecta", "redirect" => "/views/login.html"));
    }
} else {
    setcookie("userData", "", time() - 3600, "/");
    echo json_encode(array("error" => true, "message" => "Usuario inexistente"));
}

$conn->close();
?>
