<script src="<?php echo JS;?>registro.js"></script>

<div class="group-registro">
  <form action="<?php echo URL.'registro'; ?>" method="POST">
    <h2>Formulario de Registro</h2>
    <div id="form1">
      <div class="inputs">
        <div>
          <label for="nombres">Nombres </label><br>
          <input type="text" name="nombres" pattern="([a-zA-Z ]){1,}" required/>   
        </div>

        <div>
          <label for="usuario">Usuario </label><br>
          <input type="text" name="usuario" pattern="([a-zA-Z]){1,}" required/>   
        </div>
      </div>

      <div class="inputs">
        <div>
          <label for="apellido_p">Apellido Paterno </label><br>
          <input type="text" name="apellido_p" pattern="([a-zA-Z ]){1,}" required/>       
        </div>

        <div>
          <label for="apellido_ma">Apellido  Materno</label><br>
          <input type="text" name="apellido_m" pattern="([a-zA-Z ]){1,}" required/>
        </div>
      </div>

      <div id="errorEmail" class="error">*Los correos no coinciden</div>
      <div class="inputs">
        <div>
          <label for="email">Email</label><br>
          <input type="email" name="correo" id="txtEmail1" onkeyup="comp()" required/>
        </div>

        <div>
          <label for="email">Confirmar Email </label><br>
          <input type="email" id="txtEmail2" onkeyup="comp()" required/>
        </div>
      </div>

      <div id="errorPassword" class="error">* Las contraseñas no coiciden</div>
      <div class="inputs">
        <div>
          <label for="password">Contraseña </label><br>
          <input type="password" name="contrasena" id="txtPassword1" onkeyup="comp()" required/>
        </div>

        <div>
          <label for="password">Confirmar Contraseña </label><br>
          <input type="password" id="txtPassword2" onkeyup="comp()" required/>
        </div>
      </div>

      <div class="inputs">
        <div>
          <label for="direccion">Direccion</label><br>
          <input type="text" name="direccion" required>
        </div>
        <div>
          <label for="nac">Fecha de nacimiento</lable>
          <input type="date" name="nac" required>
        </div>
      </div>
      <div class="inputs">
        <div>
          <label for="tarjeta"> <span class="fab" id="icon"></span> Número de tarjeta</label>
          <input type="text" name="tarjeta" id="tarjeta" pattern="([0-9]){13,16}" onkeyup="tarjetaVal()" required>
        </div>

        <div class="tow-column">
          <div>
            <label for="cvv">CVV</label>
            <input type="text" name="cvv" pattern="([0-9]){3}" required>
          </div>

          <div>
            <label for="exp">Fecha de expiración</label>
            <input type="month" name="exp" required>
          </div>
        </div>
      </div>

    </div>
    <center> <input class="form-btn" name="submit" type="submit" value="Continuar" id="btnSubmit" /></center>
  </form>
</div>
