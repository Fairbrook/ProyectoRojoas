<div class="facturas content-margin">
    <div class="column-5">
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
        </div>
    </div>
    <?php $cont = -1;
     foreach($facturas as $factura): $cont++?>
        <div class="column-5">
            <div><?php echo $factura->total; ?></div>
            <div><?php echo $factura->pedido; ?></div>
            <div><?php echo $factura->entrega; ?></div>
            <div><?php 
                if($factura->estado==1)echo "Pendiente";
                if($factura->estado==2)echo "Completado";
                if($factura->estado==3)echo "Vencido";
             ?></div>
            <div class="botones">
                <a href="<?php echo URL."factura".DS."pdf".DS.$factura->id ?>" class="btn-short" target="_blank">PDF</a>
                <a href="<?php echo URL."factura".DS."xml".DS.$factura->id ?>" class="btn-short">XML</a>
            </div>
        </div>
    <?php endforeach ?>
</div>