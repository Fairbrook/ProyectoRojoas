<script src="<?php echo JS."ver.js" ?>"></script>
<div class="error"><?php if(isset($error))echo $error; ?></div>
<div class="producto-ver content-margin">
	<div class="imagen">
		<img src="<?php echo IMG.$producto->get('imagen'); ?>" alt="">
	</div>
	<div class="attrib">
		<h1>
			<?php echo ucfirst(strtolower($producto->get("nombre")));?>
		</h1>
		<div class="big margin">
			<?php echo ucfirst(strtolower($producto->get("descripcion")));?>
		</div>
		<form action="<?php echo URL."productos".DS."ver".DS.$producto->get("id"); ?>" method="POST">
			<div class="big tow-column margin">
				<div class="tow-column">Cantidad: <input type="number" name="cantidad" value="1"  min="1" max="<?php echo $producto->get("cantidad"); ?>" onchange="calcTotal(this)" onkeyup="calcTotal(this)" class="generic-input" required></div>
				<div>Total: <span id="precio"><?php echo $producto->get("precio");?></span></div>
			</div>
			<div class="big center">
				<b>Descuentos</b>
			</div>
			<div class="medium four-column">
				<div><b>Apartir de: </b></div>
				<div id="num1"><?php echo $descuentos[0]->cantidad ?></div>
				<div id="num2"><?php echo $descuentos[1]->cantidad ?></div>
				<div id="num3"><?php echo $descuentos[2]->cantidad ?></div>
				<div>%</div>
				<div id="desc1"><?php echo $descuentos[0]->descuento ?></div>
				<div id="desc2"><?php echo $descuentos[1]->descuento ?></div>
				<div id="desc3"><?php echo $descuentos[2]->descuento ?></div>
				<div></div>
				<div>
					<div class="hide" id="icon1"><i class="fas fa-dollar-sign"></i></div>
				</div>
				<div>
					<div class="hide" id="icon2"><i class="fas fa-dollar-sign"></i></div>
				</div>
				<div>
					<div class="hide" id="icon3"><i class="fas fa-dollar-sign"></i></div>
				</div>
			</div>
			<div>
				<input type="hidden" value="<?php echo $producto->get("id"); ?>">
				<input type="submit" value="Agregar al carro" class="btn">
			</div>
		</form>
	</div>
</div>