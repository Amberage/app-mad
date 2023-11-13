<?php
include($_SERVER['DOCUMENT_ROOT'] . '/php/config.php');

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibe datos del formulario
$nombre = $_POST['nombre'];
$pregunta1 = $_POST['pregunta1'];
$pregunta2 = $_POST['pregunta2'];
$pregunta3 = $_POST['pregunta3'];
$pregunta4 = $_POST['pregunta4'];
$comentarios = $_POST['comentarios'];

// Inserta datos en la base de datos
$sql = "INSERT INTO encuesta_satisfaccion (pregunta1, pregunta2, comentarios)
        VALUES ('$nombre','$pregunta1', '$pregunta2', '$pregunta3', '$pregunta4', '$comentarios')";

if ($conn->query($sql) === TRUE) {
    echo "Encuesta enviada correctamente";
} else {
    echo "Error al enviar la encuesta: " . $conn->error;
}

$conn->close();
?>