<?php

$conexion = require_once "Config/database.php";
$buscarUsuario = "SELECT * FROM $tbl_name WHERE correo = '$_POST[email]' ";
$result = $conexion->query($buscarUsuario);
$count = mysqli_num_rows($result);

if ($count == 1) {
	header('Location: Fail.php');
}
else{
	$query = "INSERT INTO usuarios (nombres,apellido_p,apellido_m,direccion,correo, contrasena)
	VALUES ('$_POST[nombres]','$_POST[apellido_p]','$_POST[apellido_ma]','$_POST[direccion]','$_POST[email]', '$_POST[password]')";

	if ($conexion->query($query) === TRUE) {

		header('Location: tarjeta.php');
	}

	else {
		echo "Error al crear el usuario." . $query . "<br>" . $conexion->error; 
	}
}
mysqli_close($conexion);

?>