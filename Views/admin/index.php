<div class="stock content-margin">
	<div>
		<div>
			<h2>Imagen</h2>
		</div>
		<div>
			<h2>Nombre</h2>
		</div>
		<div>
			<h2>Descripcion</h2>
		</div>
		<div>
			<h2>Cantidad</h2>
		</div>
		<div>
			<h2></h2>
		</div>
	</div>
	<?php foreach($productos as $producto): ?>
		<div>
			<div>
				<img src="<?php echo IMG.$producto->imagen; ?>" alt="">
			</div>
			<div>
				<?php echo $producto->nombre; ?>
			</div>
			<div>
				<?php echo $producto->descripcion; ?>
			</div>
			<div>
				<?php echo $producto->cantidad; ?>
			</div>
			<div>
				<a href="<?php echo URL."admin".DS."mod".DS.$producto->id; ?>" class="btn">Editar</a>
			</div>
		</div>
	<?php endforeach ?>
</div>