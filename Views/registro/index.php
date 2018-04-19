<script>
  function comp(){
    $("#btnSubmit").removeAttr("disabled");;
    $("#errorPassword").css("display","none");
    $("#errorEmail").css("display","none");

    if($("#txtEmail1").val()!=$("#txtEmail2").val()){
      $("#btnSubmit").attr("disabled","true");
      $("#errorEmail").css("display","block");
    }

    if($("#txtPassword1").val()!=$("#txtPassword2").val()){
      $("#btnSubmit").attr("disabled","true");
      $("#errorPassword").css("display","block");
    }
    
  }
</script>

<div class="group-registro">
  <form action="<?php echo URL.'registro'; ?>" method="POST">
    <h2>Formulario de Registro</h2>

    <div class="inputs">
      <div>
        <label for="nombres">Nombres </label><br>
        <input type="text" name="nombres" required/>   
      </div>

      <div>
        <label for="nombres">Usuario </label><br>
        <input type="text" name="usuario" required/>   
      </div>
    </div>

    <div class="inputs">
      <div>
        <label for="apellido_p">Apellido Paterno </label><br>
        <input type="text" name="apellido_p" required/>       
      </div>

      <div>
        <label for="apellido_ma">Apellido  Materno</label><br>
        <input type="text" name="apellido_m" required/>
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
  <div>
      <span class="direccion">Direccion</span> <input type="text" name="direccion">
  </div>

  <center> <input class="form-btn" name="submit" type="submit" value="Siguiente" id="btnSubmit" /></center>
</p>
</form>
</div>
