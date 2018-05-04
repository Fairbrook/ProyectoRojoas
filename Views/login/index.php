<div class="login">
    <h1>Entra</h1>
    <form action="<?php echo URL;?>login" method="POST">
        <?php if(isset($error)):?>
        <div class ="error">Error en el login</div>
        <?php endif?>
        <div class="tow-column">
            <label for="username">Nombre de usuario:</label>
            <input type="text" name="username" class="txt">
        </div>
        <div class="tow-column">
            <label for="pass">Contraseña: </label>
            <input type="password" name="pass" class="txt">
        </div>
        <div><input type="submit" value="Ingresar" class="btn"></div>
    </form>
    <a href="<?php echo URL;?>registro" class="btn">Registrate</a>
</div>