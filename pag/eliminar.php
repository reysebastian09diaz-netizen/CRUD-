<?php

if (!isset($_GET['id'])) {

    echo "No se seleccionó ningún usuario";
    exit;

}

$id = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Eliminar usuario</title>

</head>

<body>

<h2>Eliminar usuario</h2>

<p>¿Está seguro de que desea eliminar este usuario?</p>

<form action="../includes/users/delete.php" method="POST">

    <input type="hidden" name="id_usuario" value="<?php echo $id; ?>">

    <button type="submit">Eliminar usuario</button>

</form>

<br>

<a href="users.php">Cancelar</a>

</body>

</html>