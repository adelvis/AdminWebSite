<?php
    
    if($_SESSION["perfil"] != "administrador"){
        echo '<script>      

              window.location = "inicio";

              </script> ';

       return;
    }
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestor Comercio</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Gestor Comercio</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">Configuraciones Básicas</h3>
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Comercio</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Redes Sociales</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Logo e icono</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Colores</a></li>
              
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">

                      <?php
                            /*--===============================================
                            =         ADMINISTRADOR DE COMERCIO          =
                            =============================================== */
                            include "commerce/infoCommerce.php";

                      ?>      
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                      <?php
                             /*=============================================
                            =         ADMINISTRACIÓN DE REDES SOCIALES    =
                            =============================================*/
                            include "commerce/socialNetworks.php";

                      ?>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                      <?php
                             /*=============================================
                            =         ADMINISTRACIÓN DE LOGO E ICOCO        =
                            =============================================*/
                            include "commerce/logotipo.php";

                      ?>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_4">
                      <?php
                          /*=============================================
                            =         ADMINISTRACIÓN DE COLORES    =
                            =============================================*/

                            include "commerce/colors.php";

                      ?>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
    </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->