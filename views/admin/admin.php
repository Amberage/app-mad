<?php
$servername = "localhost";
$username = "amberage_root";
$password = "Q2om%)?H.sAQV(r(MD";
$database = "amberage_madness";

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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['crear_usuario'])) {
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

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editar_usuario'])) {
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="/assets/images/logo.png" />
</head>
<style>
    body {
        background-color: #ffffff;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1600 900'%3E%3Cdefs%3E%3ClinearGradient id='a' x1='0' x2='0' y1='1' y2='0' gradientTransform='rotate(90,0.5,0.5)'%3E%3Cstop offset='0' stop-color='%23FFEA8D'/%3E%3Cstop offset='1' stop-color='%23FF80FD'/%3E%3C/linearGradient%3E%3ClinearGradient id='b' x1='0' x2='0' y1='0' y2='1' gradientTransform='rotate(95,0.5,0.5)'%3E%3Cstop offset='0' stop-color='%23A36EFF'/%3E%3Cstop offset='1' stop-color='%2373FF60'/%3E%3C/linearGradient%3E%3C/defs%3E%3Cg fill='%23FFF' fill-opacity='0' stroke-miterlimit='10'%3E%3Cg stroke='url(%23a)' stroke-width='3.3'%3E%3Cpath transform='translate(-9.1 -2.4000000000000004) rotate(-2.7 1409 581) scale(0.9779519999999999)' d='M1409 581 1450.35 511 1490 581z'/%3E%3Ccircle stroke-width='1.1' transform='translate(-22 10) rotate(-1 800 450) scale(0.9969959999999999)' cx='500' cy='100' r='40'/%3E%3Cpath transform='translate(-3.8 6) rotate(-14 401 736) scale(0.9969959999999999)' d='M400.86 735.5h-83.73c0-23.12 18.74-41.87 41.87-41.87S400.86 712.38 400.86 735.5z'/%3E%3C/g%3E%3Cg stroke='url(%23b)' stroke-width='1'%3E%3Cpath transform='translate(60 4) rotate(-1 150 345) scale(1.005984)' d='M149.8 345.2 118.4 389.8 149.8 434.4 181.2 389.8z'/%3E%3Crect stroke-width='2.2' transform='translate(4 -29) rotate(-21.6 1089 759)' x='1039' y='709' width='100' height='100'/%3E%3Cpath transform='translate(-15.2 0.7999999999999998) rotate(-3.5999999999999996 1400 132) scale(0.96)' d='M1426.8 132.4 1405.7 168.8 1363.7 168.8 1342.7 132.4 1363.7 96 1405.7 96z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        background-attachment: fixed;
        background-size: cover;
        margin: 0;
        padding: 0;
        width: 100%;
    }
</style>
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
            echo "<td><a href='admin.php?edit_id=" . $row['id'] . "'>Editar</a> | 
                  <a href='admin.php?delete_id=" . $row['id'] . "'>Eliminar</a></td>";
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
            <input type="submit" name="editar_usuario" value="Guardar Cambios">
        </form>
    <?php endif; ?>

    <h2>Crear Usuario</h2>
    <form method="post" action="">
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
        <input type="submit" value="Crear">
    </form>
</body>
</html>
