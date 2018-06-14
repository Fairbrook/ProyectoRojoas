<div class="content-margin">
<h2 class="h2-title">Modificar producto</h2>
<div class="update-prod content-margin">
	<div class="imagen">
		<img src="<?php echo IMG.$producto->get('imagen'); ?>" alt="">
	</div>
    <div class="datos">
        <div>
            <div>Nombre:</div>
            <div><?php echo $producto->get("nombre");?></div>
        </div>
        <div>
            <div>Descripción:</div>
            <div><?php echo $producto->get("descripcion"); ?></div>
        </div>
        <div>
            <div>Precio:</div>
            <div><?php echo $producto->get("precio"); ?></div>
        </div>
        <div>
            <div>Categoria:</div>
            <div><?php echo $categoria->get("nombre");?> </div>
        </div>
        <form action="<?php echo URL."admin".DS."mod".DS.$producto->get("id") ?>" method="post">
            <div>
                <div>Cantidad: </div>
                <div><input type="number" name="cantidad" value="<?php echo $producto->get("cantidad"); ?>" min="<?php echo $producto->get("cantidad"); ?>" class="generic-input"></div>
            </div>

            <div>
                <div>Descuento 1:</div>
                <div><input type="number" name="desc1" class="generic-input" min="0" value="<?php echo $descuentos[0]->descuento; ?>"></div>
                <div>Numero:</div>
                <div><input type="number" name="num1" class="generic-input" min="0" value="<?php echo $descuentos[0]->cantidad; ?>"></div>
            </div>
            <div>
                <div>Descuento 2:</div>
                <div><input type="number" name="desc2" class="generic-input" min="0" value="<?php echo $descuentos[1]->descuento; ?>"></div>
                <div>Numero:</div>
                <div><input type="number" name="num2" class="generic-input" min="0" value="<?php echo $descuentos[1]->cantidad; ?>"></div>
            </div>  
            <div>
                <div>Descuento 3:</div>
                <div><input type="number" name="desc3" class="generic-input" min="0" value="<?php echo $descuentos[2]->descuento; ?>"></div>
                <div>Numero:</div>
                <div><input type="number" name="num3" class="generic-input" min="0" value="<?php echo $descuentos[2]->cantidad; ?>"></div>
            </div>
            <input type="submit" value="Actualizar" class="btn">
        </form>
    </div>
</div>
</div>
