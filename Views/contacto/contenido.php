<?php
return "
<div>
	<div style='margin:0 auto;'>
		<h1>Comentarios de <b>".$_POST['nombre']."</b> para <em>Ropa El Carlos</em></h1>
	</div>
	<div style='margin:0 auto;'>
			<h2><b>Telefono:</b> ".$_POST['telefono']."</h2>
			<h2><b>Email:</b> ".$_POST['email']."</h2>
			<h2><b>Comentario:</b> ".$_POST['mensaje']."</h2>
	</div>
</div>";
?>