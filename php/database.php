<?php

$connecction = mysqli_connect("localhost", "javoxdig_freddy", "soyelnumero4", "javoxdig_demo");

// Verificamos si la conexión fue exitosa
if (!$connecction) {
    die("Conexión fallida: " . mysqli_connect_error()); // Si la conexión falla, se muestra un mensaje de error y se termina la ejecución del script
}

// Cerramos la conexión a la base de datos utilizando la función mysqli_close
//mysqli_close($conexion);