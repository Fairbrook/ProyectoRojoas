<div class="add content-margin">
	
	<div>
		<h2 class="h2-title">Añadir un producto</h2>
	</div>

	<form action="<?php echo URL."admin".DS."add" ?>" method="POST" class="">
		<div class="form-add">
			<div class="line">
				<div>Nombre:</div>
				<input type="text" name="nombre" class="generic-input">
			</div>
			<div class="line">
				<div>Descripción:</div>
				<input type="text" name="descripcion" class="generic-input">
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
				<select>
					
				</select>
			</div>
			<div class="line">
				<div>Descuento 1:</div>
				<input type="number" min="0" name="desc1" class="generic-input">
				<div>Número de productos:</div>
				<input type="number" min="0" name="cant1" class="generic-input">
			</div>
			<div class="line">
				<div>Descuento 2:</div>
				<input type="number" min="0" name="desc2" class="generic-input">
				<div>Número de productos:</div>
				<input type="number" min="0" name="cant2" class="generic-input">
			</div>
			<div class="line">
				<div>Descuento 3:</div>
				<input type="number" min="0" name="desc3" class="generic-input">
				<div>Número de productos:</div>
				<input type="number" min="0" name="cant3" class="generic-input">
			</div>
		</div>
		
		
		<input type="submit" value="Añadir" class="btn">
	</form>
</div>