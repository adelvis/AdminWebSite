  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

  	<!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="inicio" class="nav-link">Inicio</a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        <?php

          if($_SESSION["foto"] == ""){
            echo '<img src="views/img/perfiles/default/anonymous.png" class="user-image img-circle elevation-2" alt="User Image">';
          }else{
            echo '<img src="'.$_SESSION["foto"].'" class="user-image img-circle elevation-2" alt="User Image">';
          }

        ?>	
          
         
          <span class="d-none d-md-inline"><?php echo $_SESSION["nombre"]; ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-secondary">
          <?php

              if($_SESSION["foto"] == ""){
                echo '<img src="views/img/perfiles/default/anonymous.png" class="user-image img-circle elevation-2" alt="User Image">';
              }else{
                echo '<img src="'.$_SESSION["foto"].'" class="user-image img-circle elevation-2" alt="User Image">';
              }

          ?>	

            <p>
              <?php echo $_SESSION["nombre"].' - '.$_SESSION["perfil"]; ?>
            </p>
          </li>
          
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="profile" class="btn btn-default btn-flat">Perfil</a>
            <a href="salir" class="btn btn-default btn-flat float-right">Salida</a>
          </li>
        </ul>
      </li>
     
    </ul>


  </nav>
  <!-- /.navbar -->	