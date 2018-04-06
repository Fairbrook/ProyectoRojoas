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

  <div class="group">
    <form action="registro.php" method="POST">
      <h2>Formulario de Registro</h2>


      <label for="nombres">Nombres <span><em>(requerido)</em></span></label>
      <input type="text" name="nombres" required/>   

      <label for="nombres">Usuario <span><em>(requerido)</em></span></label>
      <input type="text" name="usuario" required/>   
      
      <label for="apellido_p">Apellido Paterno <span><em>(requerido)</em></span></label>
      <input type="text" name="apellido_p" required/>       
      
      <label for="apellido_ma">Apellido  Materno<span><em>(requerido)</em></span></label>
      <input type="text" name="apellido_ma" required/>

      <div id="errorEmail" class="error">*Los correos no coinciden</div>
      <label for="email">Email <span><em>(requerido)</em></span></label>
      <input type="email" name="email" id="txtEmail1" onkeyup="comp()" required/>
      <label for="email">Confirmar Email <span><em>(requerido)</em></span></label>
      <input type="email" id="txtEmail2" onkeyup="comp()" required/>
      
      <div id="errorPassword" class="error">* Las contraseñas no coiciden</div>
      <label for="password">Contraseña <span><em>(requerido)</em></span></label>
      <input type="password" name="password" id="txtPassword1" onkeyup="comp()" required/>
      <label for="password">Confirmar Contraseña <span><em>(requerido)</em></span></label>
      <input type="password" id="txtPassword2" onkeyup="comp()" required/>             
      
      <center> <input class="form-btn" name="submit" type="submit" value="Siguiente" id="btnSubmit" /></center>
    </p>
  </form>
</div>
