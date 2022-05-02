<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrador de sitio Web</title>

  <link rel="icon" href="views/dist/img/AdminLTELogo.png">


  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewsport" content="width=device-width, initial-scale=1">

  <!-- ================================================
    PLUGINS DE css
  ================================================= -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="views/dist/css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- iCheck -->
  <link rel="stylesheet" href="views/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="views/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Hoja de estilo personal -->
  <link rel="stylesheet" href="views/css/template.css">
  <!-- Dropzone -->
  <link rel="stylesheet" href="views/plugins/dropzone/dropzone.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="views/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="views/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="views/plugins/summernote/summernote-bs4.css">



  <!-- ================================================
    PLUGINS DE CSS DEL FRONTEND
  ================================================= -->

  <!-- Material Design Bootstrap 
  <link rel="stylesheet" href="views/css/mdb.min.css"> -->
  <!-- Video Backgroud -->
  <link rel="stylesheet" type="text/css" href="views/css/videobackground.css">
  <!-- clients brand logo carousel slider css-->
  <link rel="stylesheet" href="views/css/infinite-slider.css">
  <!-- Simple Gallery Lightbox -->
  <link rel="stylesheet" type="text/css" href="views/css/baguetteBox.min.css"> 
  <!-- Carousel of service -->
  <link rel="stylesheet" href="views/css/carousel.css">
  


  <!-- ================================================
    PLUGINS DE JAVASCRITP
  ================================================= -->
  <!-- jQuery -->
  <script src="views/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="views/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="views/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="views/dist/js/demo.js"></script>
   <!-- sweet alert2 -->
  <script src="views/plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <!-- bootstrap color picker -->
  <script src="views/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
  <!-- Dropzone -->
  <script src="views/plugins/dropzone/dropzone.js"></script>
  <!-- DataTables -->
  <script src="views/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="views/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="views/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="views/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <!-- Summernote -->
  <script src="views/plugins/summernote/summernote-bs4.min.js"></script>

  <!-- ================================================
    PLUGINS DE JAVASCRITP DEL FRONTEND
  ================================================= --> 
   <!-- MDB core JavaScript -->
  <script type="text/javascript" src="views/js/mdb.min.js"></script>
  
   <!-- Slick Carousel Client -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
  
  <!-- Simple Gallery Lightbox -->
  <script src="views/js/baguetteBox.min.js"></script>


</head>




    <?php

      if(isset($_SESSION["iniSesion"]) && $_SESSION["iniSesion"] == 'ok')
      {

            echo '<body class="hold-transition sidebar-collapse sidebar-mini">';


            //<!-- Site wrapper -->
            echo '<div class="wrapper">';

            // Head
            include "paginas/head.php";

            // Contenido
            if(isset($_GET["ruta"])) {

               if( $_GET["ruta"]=="inicio" ||
                    $_GET["ruta"]=="commerce"||
                    $_GET["ruta"]=="sections"||
                    $_GET["ruta"]=="intro"  ||
                    $_GET["ruta"]=="content"  ||
                    $_GET["ruta"]=="service"  ||
                    $_GET["ruta"]=="client"  ||
                    $_GET["ruta"]=="feature"  ||
                    $_GET["ruta"]=="gallery"  ||
                    $_GET["ruta"]=="streak"  ||
                    $_GET["ruta"]=="admIcon"  ||
                    $_GET["ruta"]=="usuarios" ||
                    $_GET["ruta"]=="profile" ||
                     $_GET["ruta"]=="test" ||
                    $_GET["ruta"]=="salir") {

                    include "paginas/".$_GET["ruta"].".php";
              } else{

                  include "paginas/404.php";

              }


            } else {
                include "paginas/inicio.php";

            }


            // footer
            include "paginas/footer.php";

            echo'</div>';
            //<!-- ./wrapper -->
             echo '</body>';

      }else{

        if(isset($_GET["ruta"])) {

            if($_GET["ruta"]=="forgot-password"){

              echo '<body class="hold-transition login-page">';

              include "paginas/forgot-password.php";

              echo '</body>';

              return;

            }


        }
          
        echo '<body class="hold-transition sidebar-collapse sidebar-mini login-page">';


        include "paginas/login.php";


        echo '</body>';

      }




            

    ?>









</html>

<!-- ================================================
    PLUGINS DE JAVASCRITP CUSTOMER
================================================= -->

<script src="views/js/template.js"></script> 
<script src="views/js/managerCommerce.js"></script>
<script src="views/js/managerIntro.js"></script>
<script src="views/js/managerContent.js"></script>
<script src="views/js/managerClient.js"></script>
<script src="views/js/managerGallery.js"></script>
<script src="views/js/managerService.js"></script>
<script src="views/js/managerFeature.js"></script>
<script src="views/js/managerStreak.js"></script>
<script src="views/js/managerSections.js"></script>
<script src="views/js/managerUser.js"></script>
<script src="views/js/manegerIcon.js"></script>