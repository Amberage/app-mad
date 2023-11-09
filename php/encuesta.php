<?php
include 'config.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$pregunta1 = $_POST["pregunta1"];
$pregunta2 = $_POST["pregunta2"];
$pregunta3 = $_POST["pregunta3"];
$pregunta4 = $_POST["pregunta4"];
$comentarios = $_POST["comentarios"];

$sql = "INSERT INTO encuesta_satisfacción (pregunta1, pregunta2, pregunta3, pregunta4, comentarios)
        VALUES ('$pregunta1', '$pregunta2', '$pregunta3', '$pregunta4', '$comentarios')";

if ($conn->query($sql) === TRUE) {
    echo "Respuestas guardadas correctamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>