<style>
	#correo{
		background-color: #232222;
		color: #6D6C6C;
		width: 550px;
		font-size: 1.5em;
	}

	#correo .titulo{
		color: white;
		text-align: center;
		width: 80%;
		margin: 0 auto;
	}

	#correo .contenido{
		text-align: justify;
		margin: 0 auto;
		width: 80%;

		display: grid;
		grid-template-columns: auto auto;
		grid-gap: 10px;
	}

	#correo .contenido .tag{
		text-align: right;
		margin-right: 10px;
	}
</style>

<div id="correo">
	<div class="titulo">
		<h1>Comentarios de <?php echo $_POST['nombre']; ?> para <em>Ropa El Carlos</em></h1>
	</div>
	<div class="contenido">
			<div class="tag">Telefono:</div>
			<div><?php echo $_POST['telefono']; ?></div>
		
			<div class="tag">Email:</div>
			<div><?php echo $_POST['email']; ?></div>
		
			<div class="tag">Comentario:</div>
			<div><?php echo $_POST['mensaje']; ?></div>
		
	</div>
</div>