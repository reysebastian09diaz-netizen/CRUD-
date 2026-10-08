<?php

session_start();

require_once(__DIR__ . '/../db/conexion.php');
require_once(__DIR__ . '/../includes/users/funciones.php');

if (!isset($_SESSION["cedula"])) {
    header("Location: ../index.php");
    exit();
}

$id = $_GET["id"];

$usuario = obtener_usuario_por_id($id);

if (!$usuario) {
    echo "Usuario no encontrado.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST["nombre"];
    $documento = $_POST["documento"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $direccion = $_POST["direccion"];
    $contraseña = $_POST["contraseña"];

    if (actualizar_usuario(
        $id,
        $nombre,
        $documento,
        $telefono,
        $email,
        $direccion,
        $contraseña
    )) {

        header("Location: users.php");
        exit();
    } else {

        echo "Error al actualizar el usuario.";
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Actualizar Usuario</title>

</head>

<body>

    <h1>Actualizar Usuario</h1>

    <form method="POST">

        <label>Nombre:</label>
        <br>
        <input type="text" name="nombre"
            value="<?php echo $usuario['nombre']; ?>" required>

        <br><br>

        <label>Cédula:</label>
        <br>
        <input type="text" name="documento"
            value="<?php echo $usuario['documento']; ?>" required>

        <br><br>

        <label>Teléfono:</label>
        <br>
        <input type="text" name="telefono"
            value="<?php echo $usuario['telefono']; ?>" required>

        <br><br>

        <label>Email:</label>
        <br>
        <input type="email" name="email"
            value="<?php echo $usuario['email']; ?>" required>

        <br><br>

        <label>Dirección:</label>
        <br>
        <input type="text" name="direccion"
            value="<?php echo $usuario['direccion']; ?>">

        <br><br>

        <label>Contraseña:</label>
        <br>
        <input type="password" name="contraseña"
            value="<?php echo $usuario['contraseña']; ?>" required>

        <br><br>

        <label>Confirmar contraseña:</label>
        <br>
        <input type="password" name="confirmar_contraseña"
            value="<?php echo $usuario['contraseña']; ?>" required>
        <br><br>

        <button type="submit">Guardar cambios</button>

    </form>

    <br>

    <a href="users.php">Volver a usuarios</a>

</body>

</html>