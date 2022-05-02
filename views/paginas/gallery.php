<?php

		
	$item = "type_block"; 

	$value = "gallery";

	$section = ControllerSections::ctrGetBlocks($item, $value);

  $photos = json_decode($section["img"],true);

 


?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestor Galeria</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Gestor Galeria</li>
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
          <h3 class="card-title">Bloque Galeria</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
            <form id="formGallery">
              <div class="row">
                  <div class="col-md-5 col-sm-12">
                      <!--==============================================
                      MODIFICAR EL TIPO DEL BLOQUE (CUADRICULA -CARRUSEL)
                      ================================================--> 
                      <ph4>Seleccione el tipo de Bloque:</h4>
                      <div class="form-group">

                            <?php

                              if($section["route"] == "galleryGrid"){

                                  echo ' <div class="icheck-primary icheck-inline selTypeBlock">
                                          <input type="radio" value="galleryGrid" id="radioGrilla" name="typeBlock" checked>
                                          <label for="radioGrilla">
                                            Cuadricula
                                          </label>
                                          </div>



                                          <div class="icheck-primary icheck-inline selTypeBlock">
                                            <input type="radio" value="galleryCar" id="radioCarrucel" name="typeBlock">
                                            <label for="radioCarrucel">
                                              Carrusel
                                            </label>
                                          </div>

                                          <div class="icheck-primary icheck-inline selTypeBlock">
                                            <input type="radio" value="gallery" id="radioCarrucel2" name="typeBlock">
                                            <label for="radioCarrucel2">
                                              Estandar
                                            </label>
                                          </div>
                              ';


                              }elseif($section["route"] == "galleryCar"){

                                echo ' <div class="icheck-primary icheck-inline selTypeBlock">
                                          <input type="radio" value="galleryGrid" id="radioGrilla" name="typeBlock">
                                          <label for="radioGrilla">
                                            Cuadricula
                                          </label>
                                        </div>

                                        <div class="icheck-primary icheck-inline selTypeBlock">
                                          <input type="radio" value="galleryCar" id="radioCarrucel" name="typeBlock" checked>
                                          <label for="radioCarrucel">
                                            Carrusel
                                          </label>
                                        </div>

                                        <div class="icheck-primary icheck-inline selTypeBlock">
                                            <input type="radio" value="gallery" id="radioCarrucel2" name="typeBlock">
                                            <label for="radioCarrucel2">
                                              Estandar
                                            </label>
                                        </div>

                                        ';
                              }else{

                                echo ' <div class="icheck-primary icheck-inline selTypeBlock">
                                        <input type="radio" value="galleryGrid" id="radioGrilla" name="typeBlock" >
                                        <label for="radioGrilla">
                                          Cuadricula
                                        </label>
                                      </div>

                                      <div class="icheck-primary icheck-inline selTypeBlock">
                                        <input type="radio" value="galleryCar" id="radioCarrucel" name="typeBlock" >
                                        <label for="radioCarrucel">
                                          Carrusel
                                        </label>
                                      </div>

                                      <div class="icheck-primary icheck-inline selTypeBlock">
                                          <input type="radio" value="gallery" id="radioCarrucel2" name="typeBlock" checked>
                                          <label for="radioCarrucel2">
                                            Estandar
                                          </label>
                                      </div>

                                      ';



                              }


                            ?>


                      </div>

                      <!--=====================================
                      MODIFICAR  TITULO
                      ======================================--> 
                      <div class="form-group">

                        <label>Titulo:</label>

                        <input type="text" class="form-control cambioTitle"  value="<?php echo 
                        $section["title"]; ?>">


                      </div>
                      <!--=====================================
                      MODIFICAR  TITULO DE BARRA DE NAVEGACIÒN
                      ======================================--> 
                      <div class="form-group">

                        <label>Titulo Menu principal:</label>

                        <input type="text" class="form-control cambioTitleNavbar" tool value="<?php echo 
                        $section["navbar_title"]; ?>" placeholder="Titulo en el menú" data-toggle="tooltip" title="Titulo en el menú, dejelo en blanco si no desea que aparezca en el menú"  >


                      </div>

                      <!--=====================================
                      MODIFICAR  backgroundcolor
                      ======================================--> 
                       <!-- Color Picker -->
                      
                       <div class="form-group">  

                          <label>Color de Fondo:</label>

                          <div class="input-group my-colorpicker" id="fondoColor">           
                                <input type="text" class="form-control my-colorpicker cambioColorFondo" id="color1" value="<?php echo $section["backgroundcolor"];   ?>">

                                <div class="input-group-append">
                                      <?php

                                      echo '<span class="input-group-text"><i class="fas fa-square" id="ColorFondo" style="color:'.$section["backgroundcolor"].' "></i></span>';
                                    ?>
                                </div>            
                          </div>

                      </div>

                  </div>

                  <div class="col-md-7 col-sm-12">

                    <!--==============================================
                      MODIFICAR published
                    ================================================--> 
                    <div class="form-group">

                        <?php

                          if($section["published"] == "1"){

                            echo '
                            
                              <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                  <input type="checkbox" class="custom-control-input" id="switchPublic" checked>
                                  <label class="custom-control-label" for="switchPublic">Publicar</label>
                              </div>
                            
                            ';

                        

                          }else{

                            echo '
                            
                              <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                  <input type="checkbox" class="custom-control-input" id="switchPublic">
                                  <label class="custom-control-label" for="switchPublic">Publicar</label>
                              </div>
                            
                            ';


                          }

                        ?>  
                    </div>

                    <!--=====================================
                    ENTRADA PARA AGREGAR MULTIMEDIA
                    ======================================-->
                    <div class="form-group agregarMultimedia"> 

                        <div class="row previsualizarImagenes">

                          <?php


                              for ($i=0; $i <  count($photos); $i++) { 

                               

                                echo '
                                  <div class="col-md-3">
                                      <div class="thumbnail text-center" indice="'.$i.'">
                                
                                          <img class="imagenesRestantes" src="'.$photos[$i]["foto"].'" style="width:45%" >
                                          <div class="removerImagenes" style="cursor:pointer">Remove file</div>
                                      </div>
                                  </div>
                                '; 
                                

                              }


                          ?>  
                        
                        </div>   

                        <div class="multimediaFisica needsclick dz-clickable" >

                            <div class="dz-message needsclick">
                              
                              Arrastrar o dar click para subir imagenes.

                            </div>

                        </div>

                    </div> 


                  </div>

              </div> 
            </form>     
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
           <div class="preload"></div>
           <?php
              echo '
                      <button type="button" class="btn btn-primary pull-left guardarGallery"
                          id="'.$section["id"].'"
                          title ="'.$section["title"].'"
                          route ="'.$section["route"].'"
                          navbar_title ="'.$section["navbar_title"].'"
                          path_navbar ="'.$section["path_navbar"].'"
                          description="'.$section["description"].'"
                          img="'.$section["img"].'"
                          imgOld="'.$section["img"].'"
                          imgNew=""
                          backgroundcolor = "'.$section["backgroundcolor"].'"
                          published = "'.$section["published"].'"
                          type_block = "'.$section["type_block"].'"

                      >Guardar</button>
                  ';

            ?>      
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

       <!-- Default box Pre-visualizaciòn-->
      <div class="card">
          <div class="card-header">
            <h3 class="card-title">Vista Previa (Guarde para visualizar los cambios )</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
              
            </div>
          </div>
          <div class="card-body">

            <?php
                echo 

                '<div class="container" style="background:'.$section["backgroundcolor"].'" id="fondoBlock">';

            ?>

            <!--Section: Content-->
            <section class="text-center dark-grey-text mb-5" id = "gallery">   
              
              <div class="container" >

                  
                   <!--Section heading-->
                  <h2 class="h2-responsive font-weight-bold text-center colorTitle titleBlock"><?php echo $section["title"];  ?></h2>
                  </br>
                  
                    <?php

                      if($section["route"]=="galleryCar"){

                            echo '
                                  <div id="carousel-thumb" class="carousel slide carousel-fade carousel-summary" data-ride="carousel">
                                      <!--Slides-->
                                      <div class="carousel-inner" role="listbox">                 
                            ';
                      }else{

                            echo '
                                  <div id="carousel-thumb" class="carousel slide carousel-fade carousel-summary" data-ride="carousel" style="display:none">
                                      <!--Slides-->
                                      <div class="carousel-inner" role="listbox">                 
                            ';
                      };
                            $flagActivo = 0;
                            for ($i=0; $i <  count($photos); $i++) { 
                              
                              if($flagActivo == 0) {

                                $flagActivo =1;

                                echo '                            
                                          <div class="carousel-item active">
                                            <img class="d-block w-100" src="'.$photos[$i]["foto"].'"
                                              alt="imagen" style="height: 540px">
                                          </div>

                                        ';


                              }else{

                                echo '

                                          <div class="carousel-item">
                                            <img class="d-block w-100" src="'.$photos[$i]["foto"].'"
                                              alt="Second slide" style="height: 540px">
                                          </div>
                                          ';
                              }  

                            } 

                            echo '
                                      </div>
                                      <!--/.Slides-->
                                      <!--Controls-->
                                      <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                          <span class="sr-only">Previous</span>
                                      </a>
                                      <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                          <span class="sr-only">Next</span>
                                      </a>
                                      <!--/.Controls-->
                                      <ol class="carousel-indicators" id="carrucelMini">
                                  ';
                            $flagActivo2 = 0;

                            for ($i=0; $i <  count($photos); $i++) {

                              if($flagActivo2==0){

                                  $flagActivo2 =1;
          
                                            echo '

                                            <li data-target="#carousel-thumb" data-slide-to="'.$i.'" class="active">
                                              <img src="'.$photos[$i]["foto"].'" width="100" height="66">
                                            </li>


                                        ';
                              }else{

                                            echo ' 


                                            <li data-target="#carousel-thumb" data-slide-to="'.$i.'">
                                              <img src="'.$photos[$i]["foto"].'" width="100" height="66">
                                            </li>



                                            ';

                              }
                            }




                            echo '
                                      </ol>     
                                  </div>';

                      
                      
                      if($section["route"]=="galleryGrid"){

                        echo '
                              <div class="tz-gallery">

                                  <div class="row">
                        
                        ';
                      }else{
                        echo '
                              <div class="tz-gallery" style="display:none">

                                  <div class="row">
                      
                        ';
                      }
                        for ($i=0; $i <  count($photos); $i++) { 

                          echo '
      
                                      <div class="col-sm-6 col-md-4">
                                          <a class="lightbox" href="'.$photos[$i]["foto"].'">
                                              <img class="imageGallery" src="'.$photos[$i]["foto"].'" alt="imagen">
                                          </a>
                                      </div>
      
  
  
                          ';
  
                                     
                        }

                        echo '
                                  </div>

                              </div>
                        
                        
                        ';

                      
                      if($section["route"]=="gallery") {
                        # code...
                        echo ' <div id="demo" class="carousel slide" data-ride="carousel">
                                  <!-- Indicators -->
                                  <ul class="carousel-indicators">  
                                              
                        ';
                      }else{

                        echo ' <div id="demo" class="carousel slide" data-ride="carousel" style="display:none">
                                  <!-- Indicators -->
                                  <ul class="carousel-indicators">  
                                              
                        ';


                      }  
                        $flagActivo2 = 0;

                        for ($i=0; $i <  count($photos); $i++) {
            
                             if($flagActivo2==0){
            
                                  $flagActivo2 = 1;
            
                                  echo ' <li data-target="#demo" data-slide-to="'.$i.'" class="active"></li>';
            
                             }else{
            
                                  echo ' <li data-target="#demo" data-slide-to="'.$i.'"></li>';
                             }
                  
            
                        }

                        echo '    </ul>
      
                                  <!-- The slideshow -->
                                  <div class="carousel-inner">
                        ';

                        $flagActivo = 0;

                        for ($i=0; $i <  count($photos); $i++) {            
                             if($flagActivo==0){            
                                  $flagActivo = 1;            
                                  echo ' 
                                           <div class="carousel-item active">
                                              <img src="'.$photos[$i]["foto"].'" alt="" width="1100" height="640">
                                            </div>
            
                                        ';           
                             }else{
                                  echo '
            
                                            <div class="carousel-item">
                                              <img src="'.$photos[$i]["foto"].'" alt="" width="1100" height="640">
                                            </div>           
            
                                        ';
                             }
                        }

                        echo '
                        
                                  </div>
                
                                  <!-- Left and right controls -->
                                  <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                  </a>
                                  <a class="carousel-control-next" href="#demo" data-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                  </a>
                                </div>
                                
                                <br>
                        
                        
                        
                        
                        
                        ';

                      
                    ?>
              </div>

              <br>

            </section>
            

          </div>
      </div>                    

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->