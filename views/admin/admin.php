<?php
$servername = "tu_servidor";
$username = "tu_usuario";
$password = "tu_contraseña";
$database = "tu_base_de_datos";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Leer (Mostrar) Registros
$query = "SELECT * FROM usuarios";
$result = $conn->query($query);

// Crear (Insertar) un Nuevo Registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $nombre = $_POST['nombre'];
    $aPaterno = $_POST['aPaterno'];
    $aMaterno = $_POST['aMaterno'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $userType = $_POST['userType'];
    $ip = $_SERVER['REMOTE_ADDR']; // Obtener la dirección IP del cliente

    $insertQuery = "INSERT INTO usuarios (username, nombre, aPaterno, aMaterno, correo, password, userType, ip)
                    VALUES ('$username', '$nombre', '$aPaterno', '$aMaterno', '$correo', '$password', '$userType', '$ip')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "Registro creado con éxito.";
    } else {
        echo "Error al crear el registro: " . $conn->error;
    }
}

// Actualizar (Editar) un Registro
if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recuperar los datos del formulario de edición
        $editedUsername = $_POST['editedUsername'];
        $editedNombre = $_POST['editedNombre'];
        $editedAPaterno = $_POST['editedAPaterno'];
        $editedAMaterno = $_POST['editedAMaterno'];
        $editedCorreo = $_POST['editedCorreo'];
        $editedPassword = $_POST['editedPassword'];
        $editedUserType = $_POST['editedUserType'];

        $updateQuery = "UPDATE usuarios 
                        SET username = '$editedUsername', nombre = '$editedNombre', aPaterno = '$editedAPaterno', aMaterno = '$editedAMaterno',
                        correo = '$editedCorreo', password = '$editedPassword', userType = '$editedUserType'
                        WHERE id = $edit_id";

        if ($conn->query($updateQuery) === TRUE) {
            header("Location: nombre_de_esta_pagina.php"); // Redirigir a la página actual después de la actualización
        } else {
            echo "Error al actualizar el registro: " . $conn->error;
        }
    }

    // Obtener los datos del registro que se va a editar
    $editQuery = "SELECT * FROM usuarios WHERE id = $edit_id";
    $editResult = $conn->query($editQuery);
    $editData = $editResult->fetch_assoc();
}

// Eliminar un Registro
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    $deleteQuery = "DELETE FROM usuarios WHERE id = $delete_id";

    if ($conn->query($deleteQuery) === TRUE) {
        header("Location: nombre_de_esta_pagina.php"); // Redirigir a la página actual después de la eliminación
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Usuarios</title>
</head>
<body>
    <h1>Lista de Usuarios</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Correo</th>
            <th>Password</th>
            <th>Tipo de Usuario</th>
            <th>Fecha de Registro</th>
            <th>Dirección IP</th>
            <th>Acciones</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['aPaterno'] . "</td>";
            echo "<td>" . $row['aMaterno'] . "</td>";
            echo "<td>" . $row['correo'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "<td>" . $row['userType'] . "</td>";
            echo "<td>" . $row['fechaRegistro'] . "</td>";
            echo "<td>" . $row['ip'] . "</td>";
            echo "<td><a href='nombre_de_esta_pagina.php?edit_id=" . $row['id'] . "'>Editar</a> | 
                  <a href='nombre_de_esta_pagina.php?delete_id=" . $row['id'] . "'>Eliminar</a></td>";
            echo "</tr>";
        }
        ?>
    </table>

    <?php if (isset($_GET['edit_id'])): ?>
        <h2>Editar Usuario</h2>
        <form method="post" action="">
            <input type="hidden" name="edit_id" value="<?php echo $editData['id']; ?>">
            <label>Username:</label>
            <input type="text" name="editedUsername" value="<?php echo $editData['username']; ?>" required><br>
            <!-- Agregar otros campos de edición aquí -->
            <input type="submit" value="Guardar Cambios">
        </form>
    <?php endif; ?>

    <h2>Crear Usuario</h2>
    <form method="post" action="">
        <label>Username:</label>
        <input type="text" name="username" required><br>
        <!-- Agregar otros campos de creación aquí -->
        <input type="submit" value="Crear">
    </form>
</body>
</html>
