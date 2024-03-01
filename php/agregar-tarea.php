<?php

include("database.php");

if(isset($_POST["nombre"])){
    $nombre           = $_POST["nombre"];
    $apellido         = $_POST["apellido"];
    $domicilio        = $_POST["domicilio"];
    $correo           = $_POST["correo"];

    $query = "INSERT INTO `personal`(`nombre`, `apellido`, `domicilio`, `correo`) VALUES ('$nombre', '$apellido', '$domicilio', '$correo')";
    $result = mysqli_query($connecction, $query);

    if(!$result) {
        die("Hubo un error en la consulta". mysqli_error($connecction));
    }

    echo "Personal agregado!";
}
