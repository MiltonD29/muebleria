<div id="back"></div>

<div class="login-box">
  
  <div class="login-logo">

    <img src="vistas/img/plantilla/logo.png" class="img-responsive img-circle" style="padding:30px 100px 0px 100px">

  </div>

  <div class="login-box-body" style="background: rgba(0,0,0,.6);">

    <h3 class="login-box-msg" style="color: white;">INICIO DE SESIÓN</h3>

    <form method="post">

      <div class="form-group has-feedback">
        <input 
          type="text" 
          class="form-control" 
          placeholder="Empleado" 
          name="ingUsuario" 
          required
        >      
      </div>

      <div class="form-group has-feedback">
        <input 
          type="password" 
          class="form-control" 
          placeholder="Contraseña" 
          name="ingPassword" 
          required
        >
      </div>

      <div class="row" style="display: flex; flex-direction: column; align-items: center;">
        <div class="col-xs-4">
          <button 
            type="submit" 
            class="btn btn-primary"
            style="background: grey; border: grey;" 
          >
          Ingresar
        </button>
        </div>
      </div>

      <?php

        $login = new ControladorUsuarios();
        $login -> ctrIngresoUsuario();
        
      ?>

    </form>

  </div>

</div>
