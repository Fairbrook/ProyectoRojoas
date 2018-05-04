<div class="carrito">
    <div class="table">
        <div class="prod">
            <div><h3>Nombre</h3></div>
            <div><h3>Descripción</h3></div>
            <div><h3>Costo</h3></div>
        </div>
        <?php foreach($productos as $producto):?>
            <div class="prod">
                <div><?php echo ucfirst($producto->nombre);?></div>
                <div><?php echo ucfirst($producto->descripcion); ?></div>
                <div>$<?php echo $producto->precio;?></div>
            </div>
        <?php endforeach ?>
        <div class="prod total">
            <div></div>
            <div><h3>Total:</h3></div>
            <div>$<?php echo $total; ?></div>
        </div>
    </div>
    <a href="<?php if(isset($_SESSION['nombres']))echo URL.'comprar'; else echo URL.'login';?>" class="btn">Comprar</a>
</div>