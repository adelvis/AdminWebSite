 <?php

      $intro = ControllerIntro::ctrGetIntro();

      $title1=json_decode($intro["title1"],true);

      $title2=json_decode($intro["title2"],true);

   


 ?>  


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestor Hero</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Gestor Hero</li>
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
          <h3 class="card-title">Hero</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
           
          </div>
        </div>
        <div class="card-body">
          

            <!--=====================================
                PRE-VIEW 
            ======================================--> 
            <div class="row">

              <div class="col-md-5 col-sm-12">
                  
                  <!--=====================================
                  MODIFICAR EL TIPO DE INTRODUCCIÒN
                  ======================================--> 

                  <div class="form-group">

                      <input type="hidden" class="tipoSlide" value="1">

                      <?php

                          if($intro["type"] == "video"){

                              echo ' <div class="icheck-primary icheck-inline selTypeIntro">
                                      <input type="radio" value="video" id="radioPrimary1" name="tipoSlide" checked>
                                      <label for="radioPrimary1">
                                        Video 
                                      </label>
                                    </div>



                                     <div class="icheck-primary icheck-inline selTypeIntro">
                                      <input type="radio" value="imagen" id="radioPrimary2" name="tipoSlide">
                                      <label for="radioPrimary2">
                                        Imagen 
                                      </label>
                                    </div>
                          ';


                          }else{

                            echo ' <div class="icheck-primary icheck-inline selTypeIntro">
                                      <input type="radio" value="video" id="radioPrimary1" name="tipoSlide">
                                      <label for="radioPrimary1">
                                        Video 
                                      </label>
                                    </div>

                                     <div class="icheck-primary icheck-inline selTypeIntro">
                                      <input type="radio" value="imagen" id="radioPrimary2" name="tipoSlide" checked>
                                      <label for="radioPrimary2">
                                        Imagen 
                                      </label>
                                    </div>



                                    ';
                          }


                      ?>


                  </div> 


                  <!--=====================================
                  MODIFICAR  TITULO 1 
                  ======================================--> 
                  <div class="form-group">

                      <label>Titulo:</label>

                      <input type="text" class="form-control cambioTituloTexto1"  value="<?php echo 
                      $title1["texto"]; ?>">

                      <!-- Color Picker -->
                      <div class="form-group">                         

                          <div class="input-group my-colorpicker" id="title1Color">           
                                <input type="text" class="form-control my-colorpicker cambioColorTexto1" id="color1" value="<?php echo $title1["color"];   ?>">

                                <div class="input-group-append">
                                       <?php

                                      echo '<span class="input-group-text"><i class="fas fa-square" id="ColorTexto1" style="color:'.$title1["color"].' "></i></span>';
                                    ?>
                                </div>            
                          </div>

                      </div>

                     
                  </div>

                    <!--=====================================
                  MODIFICAR  SUBTITULO 2
                  ======================================--> 
                  <div class="form-group">

                      <label>Subtitulo:</label>

                      <input type="text" class="form-control cambioSubTituloTexto" indice="'.$key.'" value="<?php echo 
                      $title2["texto"]; ?>">

                      <!-- Color Picker -->
                      <div class="form-group">                         

                          <div class="input-group my-colorpicker" id="title2Color">           
                                <input type="text" class="form-control my-colorpicker cambioColorTexto2" id="color2" value="<?php echo $title2["color"];   ?>">

                                <div class="input-group-append">
                                       <?php

                                      echo '<span class="input-group-text"><i class="fas fa-square" id="ColorTexto2" style="color:'.$title2["color"].' "></i></span>';
                                    ?>
                                </div>            
                          </div>

                      </div>

                     
                  </div>


              </div>
              
              <div class="col-md-7 col-sm-12">

                   <!--=====================================
                    MODIFICAR LA IMAGEN 
                    ======================================--> 
                    <div class="form-group" id="loadImagen">

                        <label>Cambiar Imagen:</label>

                        <br>

                        <p class="help-block">
                            <img src="<?php echo($intro["url"]);  ?>" class="img-thumbnail previsualizarImagen" width="200px">
                        </p>

                        <input type="file" class="subirImgProducto" indice="'.$key.'">

                        <p class="help-block">Tamaño recomendado 1920px / 1280px (JPEG) </p>

                    </div>

                    <!--=====================================
                    MODIFICAR EL video
                    ======================================--> 
                    <div class="form-group" id="loadVideo">

                        <label>Cambiar Video:</label>

                        <br>

                        <p class="help-block">

                            <video src="<?php echo($intro["url"]);  ?>" width=240  height=200 controls id="preview-video">
                            Lo sentimos. Este vídeo no puede ser reproducido en tu navegador.<br>
                            </video>

                        </p>

                        <input type="file" class="subirVideo" indice="'.$key.'">

                        <p class="help-block">Tamaño 15MB </p>

                    </div>


              </div>
           
            </div>




            <div class="row">
              <div class="container-fluid">

                <h4 >Vista previa</h4>

               
                 <!--=====================================
                  PRE-VIEW DE VIDEO
                 ======================================--> 

                <div class="video-background-holder" style="height: 500px;" id="video">

                      <div class="video-background-overlay"></div>

                          <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                              <source src="<?php  echo $intro["url"];   ?>" type="video/mp4">
                          </video>

                      <div class="video-background-content container h-100">
                        <div class="d-flex h-100 text-center align-items-center">
                            <div class="w-100">

                              <?php 

                                  echo '

                                      <h1 class="display-4 title1" style="color:'.$title1["color"].'">'.$title1["texto"].'</h1>

                                      <p class="lead mb-0 title2" style="color:'.$title2["color"].'">'.$title2["texto"].'</p>


                                  ';


                               ?>
                              
                            </div>
                        </div>
                      </div>


                </div>

                <!--=====================================
                  PRE-VIEW DE IMAGEN
                 ======================================--> 
                   <div id="intro" class="view" style="height: 500px;" >

                      <input type="hidden" id="urlIntro"  value="<?php  echo $intro["url"];?>">

                          <div class="mask rgba-black-strong" style="height: 500px">

                              <div class="container-fluid d-flex align-items-center justify-content-center h-100 w-100">

                                  <div class="row d-flex justify-content-center text-center">

                                      <div class="col-md-12">

                                        <?php
                                          echo '
                                          <!-- Heading -->
                                          <h1 class="font-weight-bold pt-5 mb-2 title1" style="color:'.$title1["color"].'" >'.$title1["texto"].'</h1>

                                          <!-- Divider -->
                                          <hr class="hr-light">

                                          <!-- Description -->
                                          <h4 class="my-4 title2" style="color:'.$title2["color"].'">'.$title2["texto"].'.</h4>



                                          ';



                                        ?>

                                         
                                         
                                      </div>

                                  </div>

                              </div>

                          </div>

                      </div>




                  
              </div>
            </div>



          
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <?php

              echo '
                  <button type="button" class="btn btn-primary pull-left guardarIntro"
                      id="'.$intro["id"].'"
                      title ="'.$title1["texto"].'"
                      colorTitle ="'.$title1["color"].'"
                      subTitle ="'.$title2["texto"].'"
                      colorSubTitle ="'.$title2["color"].'"
                      url="'.$intro["url"].'"
                      urlNew="'.$intro["url"].'"
                      typeInt = "'.$intro["type"].'"


                  >Guardar</button>




              ';

          ?>
          
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->