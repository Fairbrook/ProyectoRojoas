
<div class="producto-ver">
	<div class="imagen">
		<img src="<?php echo IMG.$producto->get('imagen'); ?>" alt="">
	</div>
	<div class="attrib">
		<div class="nombre"><h1>
			<?php echo ucfirst(strtolower($producto->get("nombre")));?>
		</h1></div>
		<div class="desc">
			<?php echo ucfirst(strtolower($producto->get("descripcion")));?>
		</div>
		<div class="precio">
			<?php echo $producto->get("precio");?>
		</div>
		<div>
			<form action="<?php echo URL."productos".DS."ver".DS.$producto->get("id"); ?>">
				<input type="hidden" value="<?php echo $producto->get("id"); ?>">
				<input type="submit" value="Agregar al carro">
			</form>
		</div>
	</div>
</div>