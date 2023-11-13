<?php
include($_SERVER['DOCUMENT_ROOT'] . '/php/config.php');
session_start(); // Inicia la sesión si aún no está iniciada

// Verifica si el usuario tiene la sesión iniciada
if (!isset($_SESSION['id'])) {
    // Redirige a la página de inicio de sesión si el usuario no tiene sesión iniciada
    header("Location: iniciar_sesion.php");
    exit;
}

    //Conecta a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Verifica la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $idAlumno = $_SESSION['id_usuario']; 
    $username = $_SESSION['username']; 
    $pregunta1 = $_POST['pregunta1'];
    $pregunta2 = $_POST['pregunta2'];
    $pregunta3 = $_POST['pregunta3'];
    $pregunta4 = $_POST['pregunta4'];
    $comentarios = $_POST['comentarios'];

    //Prepara la consulta SQL para insertar en la tabla encuesta_satisfaccion
    $sql = "INSERT INTO encuesta_satisfaccion (idAlumno, username, pregunta1, pregunta2, pregunta3, pregunta4, encuestaContestada)
            VALUES ('$idAlumno', '$username', '$pregunta1', '$pregunta2', '$pregunta3', '$pregunta4', 'Si')";

    // Ejecutar la consulta y verificar si se insertaron los datos
    if ($conn->query($sql) === TRUE) {
        echo "Encuesta enviada correctamente";
    } else {
        echo "Error al enviar la encuesta: " . $conn->error;
    }
    
    $conn->close();
    ?>