<?php

include("database.php");

if(isset($_POST["id"])) {

    $id = $_POST["id"];

    $query = "SELECT * FROM personal WHERE id = {$id} ";
    $result = mysqli_query($connecction, $query);

    if(!$result) {
        die("Hubo un error en la consulta". mysqli_error($connecction));
    }

    $json = array();

    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            "id"=>$row["id"],
            "nombre"=>$row["nombre"],
            "apellido"=>$row["apellido"],
            "domicilio"=>$row["domicilio"],
            "correo"=>$row["correo"]
        );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}