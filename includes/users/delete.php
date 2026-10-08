<?php

require_once("funciones.php");

if (isset($_POST['id_usuario'])) {

    $id = $_POST['id_usuario'];

    if (eliminar_usuario($id)) {

        echo "Eliminando usuario...";

        echo "<br><br>";

        echo "<a href='../../pag/users.php'>Volver a usuarios</a>";

    } else {

        echo "Error al eliminar el usuario";

    }

} else {

    echo "No se seleccionó ningún usuario";

}
?>