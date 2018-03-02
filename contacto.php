<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, 	initial-scale=1.0">
	<link rel="stylesheet" href="./style/contacto.css">
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhuU9h4gwTWFycjogYExafwXKmZ29-ur8"></script>
	<script src="./js/jquery-3.2.1.js"></script>
	<script src="./js/navbar.js"></script>
	<script src="./js/map.js"></script>
	<script src="./js/contacto.js"></script>
	<script src="./font-awesome/js/fontawesome-all.min.js"></script>
</head>
<body>
	<?php include "navbar.php"; ?>
	<div class="cont">
		<div id="map"></div>
		<div class="formCont">
			<form>
				<span class="tag">Nombre: </span><input type="text" id="nombre">
				<span class="tag">Teléfono: </span><input type="text" id="telefono">
				<span class="tag">Email: </span><input type="email" id="email">
				<span class="tag">Comentario: </span><textarea id="mensaje" cols="0" rows="5"></textarea>
			</form>
			<button onclick="send()">Enviar</button>
		</div>
	</div>
	<?php include "footer.php"; ?>
</body>
</html>