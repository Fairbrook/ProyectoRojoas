<div class="facturas content-margin">
    <div>
        <div>
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
        </div>
    </div>
    <?php $cont = -1;
     foreach($facturas as $factura): $cont++?>
        <div>
            <div></div>
            <div><?php echo $factura->total; ?></div>
            <div><?php echo $factura->pedido; ?></div>
            <div><?php echo $factura->entrega; ?></div>
            <div><?php 
                if($factura->estado==1)echo "Pendiente";
                if($factura->estado==2)echo "Completado";
                if($factura->estado==3)echo "Vencido";
             ?></div>
            <div class="botones">
            </div>
        </div>
    <?php endforeach ?>
</div>