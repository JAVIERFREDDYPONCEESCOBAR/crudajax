<?php
include("database.php");

if (isset($_POST["id"])) {
    $id               = $_POST["id"];
    $nombre           = $_POST["nombre"];
    $apellido         = $_POST["apellido"];
    $domicilio        = $_POST["domicilio"];
    $correo           = $_POST["correo"];

    $query = "UPDATE personal SET nombre = '$nombre', apellido = '$apellido',domicilio = '$domicilio', correo = '$correo' WHERE id = '$id'";
    $result = mysqli_query($connecction, $query);

    if (!$result) {
        die("Hubo un error en la consulta" . mysqli_error($connecction));
    }

    echo "Personal ha sido actualizado";
}



