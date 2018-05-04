<?php
return "
<div id='correo'>
	<div class='titulo'>
		<h1>Comentarios de ".$_POST['nombre']." para <em>Ropa El Carlos</em></h1>
	</div>
	<div class='contenido'>
			<div class='tag'><em>Telefono:</em> ".$_POST['telefono']."</div>
		
			<div class='tag'><em>Email:</em> ".$_POST['email']."</div>

			<div class='tag'><em>Comentario:</em> ".$_POST['mensaje']."</div>
	</div>
</div>";
?>