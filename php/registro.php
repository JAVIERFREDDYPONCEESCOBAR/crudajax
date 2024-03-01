<?php
// Se utiliza para llamar al archivo que contine la conexion a la base de datos
require 'database.php';

// Validamos que el formulario y que el boton registro haya sido presionado
if(isset($_POST['registro'])) {

// Obtener los valores enviados por el formulario
$usuario = $_POST['nombre_user'];
$contrasena = $_POST['contrasena_user'];
$correo = $_POST['correo_user'];
$fecha_creacion = date('Y-m-d h:i:s', time());

// Insertamos los datos en la base de datos
$sql = "INSERT INTO usuarios (id, nombre_user, contrasena_user, correo_user, fecha_creacion) VALUES (null, '$usuario', '$contrasena', '$correo', '$fecha_creacion')";
$resultado = mysqli_query($connecction,$sql);
	if($resultado) {
		// Iserción correcta
		//echo "¡Se insertaron los datos correctamente!";
			header('Location: https://demo.javoxdigital.com.mx/index.php');
	} else {
		// Iserción fallida
		echo "¡No se puede insertar la informacion!"."<br>";
		echo "Error: " . $sql . "<br>" . mysqli_error($connecction);
		header('Location: https://demo.javoxdigital.com.mx/registro.php');
	}
}
?>
