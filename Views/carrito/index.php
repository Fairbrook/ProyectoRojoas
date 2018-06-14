<div class="carrito">
    <div class="table">
        <div class="prod">
            <div><h3 class="h2-header">Nombre</h3></div>
            <div><h3 class="h2-header">Cantidad</h3></div>
            <div><h3 class="h2-header">Costo</h3></div>
            <div></div>
        </div>
        <?php foreach($productos as $producto):?>
            <div class="prod">
                <div><?php echo ucfirst($producto["nombre"]);?></div>
                <div><?php echo ucfirst($producto["cantidad"]); ?></div>
                <div>$<?php echo $producto["subtotal"];?></div>
                <div><a href="<?php echo URL."carrito".DS."borrar".DS.$producto['id'];?>" class="btn-red">Elimnar</a></div>
            </div>
        <?php endforeach ?>
        <div class="prod total">
            <div></div>
            <div><h3 class="h2-header">Total:</h3></div>
            <div>$<?php echo $total; ?></div>
        </div>
    </div>
    <a href="<?php if(isset($_SESSION['nombres']))echo URL.'comprar'; else echo URL.'login'.DS."cookie";?>" class="btn">Comprar</a>
</div>