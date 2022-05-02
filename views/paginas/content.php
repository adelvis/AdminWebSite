<?php

		
	$item = "type_block"; 

	$value = "content";

	$section = ControllerSections::ctrGetBlocks($item, $value);

  //var_dump($section);
	


?>



<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestor Contenido</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Gestor Contenido</li>
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
          <h3 class="card-title">Bloque de Contenido</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            
          </div>
        </div>
        <div class="card-body">
            <ph4>Seleccione si quiere la imagen a la:</h4>
            <!--=====================================
                DATOS A MODIFICAR
            ======================================--> 
            <div class="row">

                <div class="col-md-5 col-sm-12">

                     <!--==============================================
                      MODIFICAR EL TIPO DEL BLOQUE (DERECHO -IZQUIERDO)
                      ================================================--> 
                      <div class="form-group">
                          
                          <input type="hidden" class="tipoBlock" value="1">

                          <?php

                            if($section["route"] == "contentSectionDer"){

                                echo ' <div class="icheck-primary icheck-inline selTypeBlock">
                                        <input type="radio" value="contentSectionDer" id="radioDer" name="typeBlock" checked>
                                        <label for="radioDer">
                                          Derecha
                                        </label>
                                      </div>



                                      <div class="icheck-primary icheck-inline selTypeBlock">
                                        <input type="radio" value="contentSectionIz" id="radioIzq" name="typeBlock">
                                        <label for="radioIzq">
                                          Izquierda
                                        </label>
                                      </div>
                            ';


                            }else{

                              echo ' <div class="icheck-primary icheck-inline selTypeBlock">
                                        <input type="radio" value="contentSectionDer" id="radioDer" name="typeBlock">
                                        <label for="radioDer">
                                          Derecha
                                        </label>
                                      </div>

                                      <div class="icheck-primary icheck-inline selTypeBlock">
                                        <input type="radio" value="contentSectionIz" id="radioIzq" name="typeBlock" checked>
                                        <label for="radioIzq">
                                          Izquierda
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

                        <input type="text" class="form-control cambioTituloTexto"  value="<?php echo 
                        $section["title"]; ?>">


                      </div>
                     
                      <!--=====================================
                      MODIFICAR  Decription
                      
                      ======================================-->   
                      <div class="form-group">
                        <label>Descripción</label>                      

                        <textarea class="textarea form-control" id="summerNote" placeholder="Ingrese el contenido"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo 
                        $section["description"]; ?></textarea>

                        <textarea class="form-control cambioDescripcion" rows="7" placeholder="Ingrese la Descripciòn ..." style="display:none"><?php echo 
                        $section["description"]; ?></textarea>


                      </div>  

                     


                </div>
                
                <div class="col-md-4 col-sm-12">
                   
                      <!--==============================================
                      MODIFICAR IMAGEN
                      ================================================-->    
                      <div class="form-group" id="loadImagen">

                        <label>Cambiar Imagen:</label>

                        <br>

                        <p class="help-block">
                            <img src="<?php echo($section["img"]);  ?>" class="img-thumbnail previsualizarImagen" width="200px">
                        </p>

                        <input type="file" class="subirImgen" indice="'.$key.'">

                        <p class="help-block">Tamaño recomendado 1366px / 768px (JPEG/PNG) </p>

                      </div>

                   
                </div>

                <div class="col-md-3 col-sm-12">
                            
                      <!--==============================================
                      MODIFICAR published
                      ================================================--> 
                      <div class="form-group">

                        <?php

                          if($section["published"] == "1"){

                            echo '
                            
                              <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                  <input type="checkbox" class="custom-control-input" id="customSwitch3" checked>
                                  <label class="custom-control-label" for="customSwitch3">Publicar</label>
                              </div>
                            
                            ';

                         

                          }else{

                            echo '
                            
                              <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                  <input type="checkbox" class="custom-control-input" id="customSwitch3">
                                  <label class="custom-control-label" for="customSwitch3">Publicar</label>
                              </div>
                            
                            ';


                          }

                        ?>  
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
                      <!--=====================================
                      MODIFICAR  TITULO DE BARRA DE NAVEGACIÒN
                      ======================================--> 
                      <div class="form-group">

                        <label>Titulo Menu principal:</label>

                        <input type="text" class="form-control cambioTituloNavbar" tool value="<?php echo 
                        $section["navbar_title"]; ?>" placeholder="Titulo en el menú" data-toggle="tooltip" title="Titulo en el menú, dejelo en blanco si no desea que aparezca en el menú"  >


                      </div>


                      
                   
                </div>

            </div>
            
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        <?php

            echo '
                <button type="button" class="btn btn-primary pull-left guardarContent"
                    id="'.$section["id"].'"
                    title ="'.$section["title"].'"
                    route ="'.$section["route"].'"
                    navbar_title ="'.$section["navbar_title"].'"
                    path_navbar ="'.$section["path_navbar"].'"
                    img="'.$section["img"].'"
                    imgOld="'.$section["img"].'"
                    imgNew=""
                    backgroundcolor = "'.$section["backgroundcolor"].'"
                    published = "'.$section["published"].'"

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
          <h3 class="card-title">Vista Previa</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            
          </div>
        </div>
        <div class="card-body">
          
            <?php

              echo 

              '<div class="container-fluid" style="background:'.$section["backgroundcolor"].'" id="fondo">';


            ?>
            <!--Section: Quienes somos-->
            <section id="about">
              
              <div class="container py-5">
                  
                  </br>
                  <!--Section heading-->
                    <h2 class="h2-responsive font-weight-bold text-center Title colorTitle"><?php echo $section["title"]; ?></h2>

                    </br>

                    <!--Grid row-->
                  <div class="row d-flex justify-content-center mb-4" id="previsulizacion">

                    <?php

                        if($section["route"]=="contentSectionDer"){

                              echo '
                              
                                <!--Grid column description-->
                                <div class="col-md-7 mb-4 text-justify" id="description">
                                  '.$section["description"].'
            
                                </div>
                                <!--Grid column-->
                              
                                <!--Grid column imagen-->
                                <div class="col-md-5 mb-4">
            
                                  <!--Featured image -->
                                  <div class="view overlay z-depth-1-half" style="height: auto;">
                                    <img src="'.$section["img"].'" class="card-img-top" alt="" >
                                    <div class="mask rgba-white-light"></div>
                                  </div>
            
                                </div>
            
                                <!--Grid column-->
                              
                              ';

                        }else{

                            echo '
                            
                                  <!--Grid column imagen-->
                                  <div class="col-md-5 mb-4">
              
                                    <!--Featured image -->
                                    <div class="view overlay z-depth-1-half" style="height: auto;">
                                      <img src="'.$section["img"].'" class="card-img-top" alt="" >
                                      <div class="mask rgba-white-light"></div>
                                    </div>
              
                                  </div>
              
                                  <!--Grid column-->
                                  
                                  <!--Grid column description-->
                                  <div class="col-md-7 mb-4 text-justify" id="description">
              
                                      '.$section["description"].'
              
                                  </div>
                                  <!--Grid column-->
                                
                            
                            ';

                        }
                    ?>    

                    

                 

                </div>
                <!--Grid row-->

              </div>	

            </section>
            <!--Section: Quienes somos	
            <hr class="my-5"> -->
        </div>
        <!--First container -->  

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