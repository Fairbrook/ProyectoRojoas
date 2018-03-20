<?php 

	$host_db = "localhost";
	$user_db = "Kevin_ceti";
 	$pass_db = "Kevin_ceti";
 	$db_name = "proyecto_rojoas";
 	$tbl_name = "usuarios";
 	$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
	return $conexion;
 ?>