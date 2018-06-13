<div class="add content-margin">
    <h2 class="h2-title">Añadir Categoria</h2>
    <form action="<?php echo URL."admin".DS."addCat" ?>" method="post">
        <div class="line form-add">
            <div>Nombre</div>
            <input type="text" name="nombre" class="generic-input">
        </div>
        <input type="submit" value="Agregar" class="btn">
    </form>
    <br>
    <br>
    <br>
    <h2 class="h2-title">Añadir Subcategoria</h2>
    <form action="<?php echo URL."admin".DS."addCat".DS."sub" ?>" method="post">
        <div class="form-add" >
            <div class="line">
                <div>Categoria:</div>
                <select name="categoria" id="" class="generic-input">
                    <?php foreach($categorias as $categoria): ?>
                        <option value="<?php echo $categoria->id; ?>"><?php echo $categoria->nombre; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="line">
                <div>Nombre</div>
                <input type="text" name="nombre" class="generic-input">
            </div>
            <div class="line">
                <div></div>
                <div>Descripcion:</div>
            </div>
            <div>
                <textarea name="descript" id="" class="generic-input"></textarea>
            </div>
        </div>
        <input type="submit" value="Agregar" class="btn">        
    </form>
</div>