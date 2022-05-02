  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

  	<!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="views/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminWeb</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    	<!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <?php

              if($_SESSION["foto"] == ""){
                echo '<img src="views/img/perfiles/default/anonymous.png" class=" img-circle elevation-2" alt="User Image">';
              }else{
                echo '<img src="'.$_SESSION["foto"].'" class="img-circle elevation-2" alt="User Image">';
              }

            ?>	
         
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION["nombre"]; ?></a>
        </div>
      </div>
      -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
	      	 <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

  	      	 	<li class="nav-item">
                  <a href="inicio" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                      Inicio
                    </p>
                  </a>
              </li>

              <?php

                if($_SESSION["perfil"] =="administrador"){

                  echo '
                          <li class="nav-item">
                              <a href="commerce" class="nav-link">
                                <i class="nav-icon fas fa-building"></i>
                                <p>
                                  Gestor Comercio
                                </p>
                              </a>
                          </li>


                          <li class="nav-item">
                              <a href="sections" class="nav-link">
                                <i class="nav-icon fas fa-stream"></i>
                                <p>
                                  Gestor Secciones
                                </p>
                              </a>
                          </li>
                  ';

                }
                

              ?>             

               

              <!--Sub menu -Dashboard --> 

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Gestor Bloques
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="intro" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Hero</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="content" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Contenido</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="service" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Servicios</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="client" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Clientes</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="feature" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Caracteristicas</p>
                    </a>
                  </li>
                   <li class="nav-item">
                    <a href="gallery" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Galeria</p>
                    </a>
                  </li>
                   <li class="nav-item">
                    <a href="streak" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Streak</p>
                    </a>
                  </li>

                  <!--<li class="nav-item">
                    <a href="test" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Test</p>
                    </a>
                  </li> --> 
                </ul>
              </li>
            <!--/ Sub menu -Dashboard --> 

             <!--Sub menu -Dashboard -->  
             <li class="nav-item">
                  <a href="admIcon" class="nav-link">
                    <i class="fa fa-object-group nav-icon"></i>
                    <p>
                      Gestor de Iconos
                    </p>
                  </a>
              </li>
              
            <!--/ Sub menu -Dashboard --> 
            <?php

                  if($_SESSION["perfil"] =="administrador"){    

                    echo '

                          
                          <li class="nav-item">
                              <a href="usuarios" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                  Usuarios
                                </p>
                              </a>
                          </li>
                        ';
                  }          
			      
            ?>
	      	 </ul>	


      </nav>
      <!-- /.sidebar-menu -->	

    </div>
    <!-- /.sidebar -->	

  </aside>	
  <!-- /Main Sidebar Container -->
