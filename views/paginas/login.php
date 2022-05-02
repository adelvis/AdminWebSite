<div id="back1"></div>

<div class="login-box">
  <div class="login-logo">
    <a href="#" class="text-white"><b>Admin</b>Site Web</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Inicia sesión para comenzar</p>

      <form  method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="ingEmail" required>
           <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Password" name="ingPassword" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>

        <?php

            $login = new ControllerUser();
            $login -> ctrAccessAdministrator();

        ?>


      </form>

      
      <p class="mb-1 mt-4">
        <a href="forgot-password">Recuperar contraseña</a>
      </p>
     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
