<?php

 $host_db = "localhost";
 $user_db = "Kevin_ceti";
 $pass_db = "Kevin_ceti";
 $db_name = "proyecto_rojoas";
 $tbl_name = "usuarios";


 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

 $buscarUsuario = "SELECT * FROM $tbl_name
 WHERE correo = '$_POST[email]' ";

 $result = $conexion->query($buscarUsuario);

 $count = mysqli_num_rows($result);

 if ($count == 1) {


header('Location: Fail.html');
 }
 else{

 $query = "INSERT INTO usuarios (nombres,apellido_p,apellido_m,direccion,correo, contrasena)
           VALUES ('$_POST[nombres]','$_POST[apellido_p]','$_POST[apellido_ma]','$_POST[direccion]','$_POST[email]', '$_POST[password]')";

 if ($conexion->query($query) === TRUE) {
 
header('Location: Success.html');
 }

 else {
 echo "Error al crear el usuario." . $query . "<br>" . $conexion->error; 
   }
 }
 mysqli_close($conexion);
?>