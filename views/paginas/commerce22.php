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

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
            <h3 class="card-title"></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
              
            </div>
        </div>
        <div class="card-body">
         
             <div class="row">

                  <div class="col-md-6 col-xs-12">
                       <!--===============================================
                        =                    BLOQUE 1                    =
                        =============================================== -->

                        <?php
                               
                            /*--===============================================
                            =         ADMINISTRADOR DE COMERCIO          =
                            =============================================== */

                            include "commerce/infoCommerce.php";

                            /*=============================================
                            =         ADMINISTRACIÓN DE REDES SOCIALES    =
                            =============================================*/

                            include "commerce/socialNetworks.php";



                        ?>


                  </div>
                  

                  <div class="col-md-6 col-xs-12">

                       <!--===============================================
                        =                    BLOQUE 2                  =
                        =============================================== -->  

                          <?php

                            /*=============================================
                            =         ADMINISTRACIÓN DE LOGO E ICOCO        =
                            =============================================*/

                            include "commerce/logotipo.php";

                            /*=============================================
                            =         ADMINISTRACIÓN DE COLORES    =
                            =============================================*/

                            include "commerce/colors.php";
                          ?>
              

                  </div>  


             </div>


        </div>
        <!-- /.card-body -->
        <div class="card-footer">
         
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->