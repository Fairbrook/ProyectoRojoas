<div class="facturas content-margin">
    <div>
        <div>
            <h2>Usuario</h2>
        </div>
        <div>
            <h2>Total</h2>
        </div>
        <div>
            <h2>Fecha de compra</h2>
        </div>
        <div>
            <h2>Fecha de entrega</h2>
        </div>
        <div>
            <h2>Estado</h2>
        </div>
        <div>
            <h2>Cambiar estado</h2>
        </div>
    </div>
    <?php $cont = -1;
     foreach($facturas as $factura): $cont++?>
        <div>
            <div><?php echo $usuarios[$cont]->get("username"); ?></div>
            <div><?php echo $factura->total; ?></div>
            <div><?php echo $factura->pedido; ?></div>
            <div><?php echo $factura->entrega; ?></div>
            <div><?php 
                if($factura->estado==1)echo "Pendiente";
                if($factura->estado==2)echo "Completado";
                if($factura->estado==3)echo "Vencido";
             ?></div>
            <div class="botones">
                <?php if($factura->estado==1):?>
                <a href="<?php echo URL."admin".DS."completado".DS.$factura->id ?>" class="btn-green">Completado</a>
                <a href="<?php echo URL."admin".DS."vencido".DS.$factura->id ?>" class="btn-red">Vencido</a>
                <?php endif ?>
            </div>
        </div>
    <?php endforeach ?>
</div>