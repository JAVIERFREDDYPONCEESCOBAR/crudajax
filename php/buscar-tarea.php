<?php

include("database.php");

$search = $_POST["search"];

if(!empty($search)) {
    $query = "SELECT * FROM personal WHERE nombre LIKE '$search%'";
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
    $jsonstring = json_encode($json);
    echo $jsonstring;
}