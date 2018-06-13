<div class="login">
    <h1>Inicio de sesión</h1>
    <form action="<?php echo URL;?>login" method="POST">
        <?php if(isset($error)):?>
        <div class ="error">Error en el login</div>
        <?php endif?>
        <div class="tow-column">
            <label for="username">Nombre de usuario:</label>
            <input type="text" name="username" class="generic-input">
        </div>
        <div class="tow-column">
            <label for="pass">Contraseña: </label>
            <input type="password" name="pass" class="generic-input">
        </div>
        <div><input type="submit" value="Iniciar sesión" class="btn"></div>
    </form>
    <a href="<?php echo URL;?>registro" class="btn">Registrate</a>
</div>