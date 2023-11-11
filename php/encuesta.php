<?php
include 'config.php';

//Verifica si se recibieron los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los valores del formulario
    $idAlumno = $_SESSION['id_usuario']; 
    $username = $_SESSION['username']; 
    $pregunta1 = $_POST['pregunta1'];
    $pregunta2 = $_POST['pregunta2'];
    $pregunta3 = $_POST['pregunta3'];
    $pregunta4 = $_POST['pregunta4'];
    $comentarios = $_POST['comentarios'];

    //Conecta a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Verifica la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    //Prepara la consulta SQL para insertar en la tabla encuesta_satisfaccion
    $sql = "INSERT INTO encuesta_satisfaccion (idAlumno, username, pregunta1, pregunta2, pregunta3, pregunta4, encuestaContestada)
            VALUES ('$idAlumno', '$username', '$pregunta1', '$pregunta2', '$pregunta3', '$pregunta4', 'Si')";

    // Ejecutar la consulta y verificar si se insertaron los datos
    if ($conn->query($sql) === TRUE) {
        echo "Encuesta almacenada correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    echo "No se han recibido datos del formulario";
}
?>