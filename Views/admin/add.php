<div class="add content-margin">

	<div>
		<h2 class="h2-title">Añadir un producto</h2>
	</div>

	<form action="<?php echo URL . "admin" . DS . "add" ?>" method="POST" enctype="multipart/form-data">
		<div class="form-add">
			<div class="line">
				<div>Nombre:</div>
				<input type="text" name="nombre" class="generic-input">
			</div>
			<div class="line">
				<div>Cantidad:</div>
				<input type="number" name="cantidad" class="generic-input">
			</div>
			<div class="line">
				<div>Precio: </div>
				<input type="text" name="precio" class="generic-input">
			</div>
			<div class="line">
				<div>Imagen:</div>
				<input type="file" name="img">
			</div>
			<div class="line">
				<div>Categoria: </div>
				<div>
				<select name="categoria">
					<?php foreach ($categorias as $categoria): ?>
						<option value=" <?php echo $categoria->id; ?> "><?php echo $categoria->nombre ?></option>
					<?php endforeach?>
				</select>
				</div>
			</div>
			<div class="line">
				<div>Descuento 1:</div>
				<input type="number" min="0" name="desc1" class="generic-input">
				<div>Número:</div>
				<input type="number" min="0" name="cant1" class="generic-input">
			</div>
			<div class="line">
				<div>Descuento 2:</div>
				<input type="number" min="0" name="desc2" class="generic-input">
				<div>Número:</div>
				<input type="number" min="0" name="cant2" class="generic-input">
			</div>
			<div class="line">
				<div>Descuento 3:</div>
				<input type="number" min="0" name="desc3" class="generic-input">
				<div>Número:</div>
				<input type="number" min="0" name="cant3" class="generic-input">
			</div>
			<div class="line">
				<div></div>
				<div>Descipcion:</div>
			</div>
			<div>
				<textarea name="descripcion"></textarea>
			</div>
		</div>


		<input type="submit" value="Añadir" class="btn">
	</form>
</div>