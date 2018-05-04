<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhuU9h4gwTWFycjogYExafwXKmZ29-ur8"></script>
<script src="./js/jquery-3.2.1.js"></script>
<script src="./js/navbar.js"></script>
<script src="./js/map.js"></script>
<script src="./js/contacto.js"></script>

<div class="cont">
	<div id="map"></div>
	<div class="formCont">
		<form action="<?php echo URL."contacto";?>" method="POST">
			<div class="inputs">
				<span class="tag">Nombre: </span><input type="text" name="nombre">
				<span class="tag">Teléfono: </span><input type="text" name="telefono">
				<span class="tag">Email: </span><input type="email" name="email">
				<span class="tag">Comentario: </span><textarea name="mensaje" cols="0" rows="5"></textarea>
			</div>
			<input type="submit" value="Enviar comentarios" class="btn">
		</form>
		<!--button onclick="send()">Enviar</button-->
	</div>
</div>