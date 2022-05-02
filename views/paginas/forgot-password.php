
<div class="login-box">
  <div class="login-logo">
    <a href="#" class="text-white"><b>Admin</b>Site Web</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">¿Olvidaste tu contraseña? Aquí puede recuperar fácilmente una nueva contraseña.</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" id="passEmail" name="passEmail" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Solicito una nueva contraseña</button>
          </div>
          <!-- /.col -->
        </div>

        <?php

        $forgotPass = new ControllerUser();
        $forgotPass -> ctrForgetPassword();

        ?>



      </form>

      <p class="mt-3 mb-1">
        <a href="login">Login</a>
      </p>
     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->



