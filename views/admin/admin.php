<?php
$servername = "localhost";
$username = "amberage_root";
$pswd = "Q2om%)?H.sAQV(r(MD";
$database = "amberage_madness";

// Crear la conexión
$conn = new mysqli($servername, $username, $pswd, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Leer (Mostrar) Registros
$query = "SELECT * FROM usuarios";
$result = $conn->query($query);

// Crear (Insertar) un Nuevo Registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['crear_usuario'])) {
    $username = $_POST['username'];
    $nombre = $_POST['nombre'];
    $aPaterno = $_POST['aPaterno'];
    $aMaterno = $_POST['aMaterno'];
    $correo = $_POST['correo'];
    $password = base64_encode($_POST['password']); // Codificar la contraseña en base64
    $userType = $_POST['userType'];
    $ip = $_SERVER['REMOTE_ADDR']; // Obtener la dirección IP del cliente
    $fechaRegistro = date("Y-m-d H:i:s"); // Generar la fecha y hora automáticamente

    $insertQuery = "INSERT INTO usuarios (username, nombre, aPaterno, aMaterno, correo, password, userType, ip, fechaRegistro)
                    VALUES ('$username', '$nombre', '$aPaterno', '$aMaterno', '$correo', '$password', '$userType', '$ip', '$fechaRegistro')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "Registro creado con éxito.";
    } else {
        echo "Error al crear el registro: " . $conn->error;
    }
}


// Actualizar (Editar) un Registro
if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editar_usuario'])) {
        // Recuperar los datos del formulario de edición
        $editedUsername = $_POST['editedUsername'];
        $editedNombre = $_POST['editedNombre'];
        $editedAPaterno = $_POST['editedAPaterno'];
        $editedAMaterno = $_POST['editedAMaterno'];
        $editedCorreo = $_POST['editedCorreo'];
        $editedPassword = base64_encode($_POST['editedPassword']); // Codificar la nueva contraseña en base64
        $editedUserType = $_POST['editedUserType'];
        
        // Actualizar la fecha de edición
        $fechaEdicion = date("Y-m-d H:i:s");
        
        $updateQuery = "UPDATE usuarios 
                        SET username = '$editedUsername', nombre = '$editedNombre', aPaterno = '$editedAPaterno', aMaterno = '$editedAMaterno',
                        correo = '$editedCorreo', password = '$editedPassword', userType = '$editedUserType', fechaRegistro = '$fechaEdicion'
                        WHERE id = $edit_id";

        if ($conn->query($updateQuery) === TRUE) {
            header("Location: admin.php"); // Redirigir a la página actual después de la actualización
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
        header("Location: admin.php"); // Redirigir a la página actual después de la eliminación
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="icon" type="image/png" href="/assets/images/logo.png" />
        <link rel="stylesheet" href="/css/styles.css" />
        <title>MAD Learning: Administración</title>
    </head>
<body>
    <div class="menu">
        <ul>
          <li style="width: 50%" class="menu-destacado"><a href="#">Administración</a></li>
          <li style="width: 50%"><a href="#" onclick="cerrarSesion()">Cerrar Sesión</a></li>
        </ul>
    </div>
    <h1>Lista de Usuarios</h1>
    <table border="1" class="tablaAdmin" style="margin: 0 auto; text-align: center;">
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
            echo "<td>" . $row['password'] . "</td>"; // Mostrar contraseña sin codificar
            echo "<td>" . $row['userType'] . "</td>";
            echo "<td>" . $row['fechaRegistro'] . "</td>";
            echo "<td>" . $row['ip'] . "</td>";
            echo "<td><a href='admin.php?edit_id=" . $row['id'] . "'>Editar</a> | 
                  <a href='admin.php?delete_id=" . $row['id'] . "'>Eliminar</a></td>";
            echo "</tr>";
        }
        ?>
    </table>

    <?php if (isset($_GET['edit_id'])): ?>
        <h1 style="font-size: 2rem; margin-top: 50px;">Editar Usuario</h1>
        <div style="text-align: center;">
            <form method="post" action="" style="display: inline-block; text-align: left; width: 200px;">
                <input type="hidden" name="edit_id" value="<?php echo $editData['id']; ?>">
                <label>Username:</label>
                <input type="text" name="editedUsername" value="<?php echo $editData['username']; ?>" required><br>
                <label>Nombre:</label>
                <input type="text" name="editedNombre" value="<?php echo $editData['nombre']; ?>" required><br>
                <label>Apellido Paterno:</label>
                <input type="text" name="editedAPaterno" value="<?php echo $editData['aPaterno']; ?>" required><br>
                <label>Apellido Materno:</label>
                <input type="text" name="editedAMaterno" value="<?php echo $editData['aMaterno']; ?>"><br>
                <label>Correo:</label>
                <input type="email" name="editedCorreo" value="<?php echo $editData['correo']; ?>" required><br>
                <label>Password:</label>
                <input type="password" name="editedPassword" value="<?php echo $editData['password']; ?>" required><br>
                <label>Tipo de Usuario:</label>
                <select name="editedUserType">
                    <option value="alumno" <?php if ($editData['userType'] == 'alumno') echo 'selected'; ?>>Alumno</option>
                    <option value="docente" <?php if ($editData['userType'] == 'docente') echo 'selected'; ?>>Docente</option>
                    <option value="administrador" <?php if ($editData['userType'] == 'administrador') echo 'selected'; ?>>Administrador</option>
                </select><br>
                <input style="margin-top: 50px;" type="submit" name="editar_usuario" value="Guardar Cambios">
            </form>
    <?php endif; ?>

    <h1 style="font-size: 2rem; margin-top: 50px;">Crear Usuario</h1>
        <div style="text-align: center;">
            <form method="post" action="" style="display: inline-block; text-align: left; width: 200px;">
                <input type="hidden" name="crear_usuario" value="1">
                <label>Username:</label>
                <input type="text" name="username" required><br>
                <label>Nombre:</label>
                <input type="text" name="nombre" required><br>
                <label>Apellido Paterno:</label>
                <input type="text" name="aPaterno" required><br>
                <label>Apellido Materno:</label>
                <input type="text" name="aMaterno"><br>
                <label>Correo:</label>
                <input type="email" name="correo" required><br>
                <label>Password:</label>
                <input type="password" name="password" required><br>
                <label>Tipo de Usuario:</label>
                <select name="userType">
                    <option value="alumno">Alumno</option>
                    <option value="docente">Docente</option>
                    <option value="administrador">Administrador</option>
                </select><br>
                <input style="margin-top: 50px;" type="submit" value="Crear Usuario">
            </form>
        <script src="js/tipoCuentaAdmin.js"></script>
</body>
</html>
