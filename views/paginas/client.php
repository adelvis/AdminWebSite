<?php

		
	$item = "type_block"; 

	$value = "customers";

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
            <h1>Gestor Clientes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Gestor Clientes</li>
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
          <h3 class="card-title">Bloque de Cliente</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            
          </div>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-5 col-sm-12">
                     <!--==============================================
                      MODIFICAR EL TIPO DEL BLOQUE (CUADRICULA -CARRUSEL)
                      ================================================--> 
                    <ph4>Seleccione el tipo de Bloque:</h4>
                    <div class="form-group">

                          <?php

                            if($section["route"] == "customersSection"){

                                echo ' <div class="icheck-primary icheck-inline selTypeBlock">
                                        <input type="radio" value="customersSection" id="radioGrilla" name="typeBlock" checked>
                                        <label for="radioGrilla">
                                          Cuadricula
                                        </label>
                                      </div>



                                      <div class="icheck-primary icheck-inline selTypeBlock">
                                        <input type="radio" value="customersSectionCar" id="radioCarrusel" name="typeBlock">
                                        <label for="radioCarrusel">
                                          Carrusel
                                        </label>
                                      </div>
                            ';


                            }else{

                              echo ' <div class="icheck-primary icheck-inline selTypeBlock">
                                        <input type="radio" value="customersSection" id="radioGrilla" name="typeBlock">
                                        <label for="radioGrilla">
                                          Cuadricula
                                        </label>
                                      </div>

                                      <div class="icheck-primary icheck-inline selTypeBlock">
                                        <input type="radio" value="customersSectionCar" id="radioCarrusel" name="typeBlock" checked>
                                        <label for="radioCarrusel">
                                          Carrusel
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

                        <input type="text" class="form-control cambioTituloClient"  value="<?php echo 
                        $section["title"]; ?>">


                      </div>

                      <!--=====================================
                      MODIFICAR  TITULO DE BARRA DE NAVEGACIÒN
                      ======================================--> 
                      <div class="form-group">

                        <label>Titulo Menu principal:</label>

                        <input type="text" class="form-control cambioTituloNavbarClient" tool value="<?php echo 
                        $section["navbar_title"]; ?>" placeholder="Titulo en el menú" data-toggle="tooltip" title="Titulo en el menú, dejelo en blanco si no desea que aparezca en el menú"  >


                      </div>

                       <!--=====================================
                      MODIFICAR  backgroundcolor
                      ======================================--> 
                       <!-- Color Picker -->
                      
                       <div class="form-group">  

                          <label>Color de Fondo:</label>

                          <div class="input-group my-colorpicker" id="fondoColorClient">           
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
                                  <input type="checkbox" class="custom-control-input" id="switchPubliClient" checked>
                                  <label class="custom-control-label" for="switchPubliClient">Publicar</label>
                              </div>
                            
                            ';

                         

                          }else{

                            echo '
                            
                              <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                  <input type="checkbox" class="custom-control-input" id="switchPubliClient">
                                  <label class="custom-control-label" for="switchPubliClient">Publicar</label>
                              </div>
                            
                            ';


                          }

                        ?>  
                    </div>
                    <!--=====================================
                    ENTRADA PARA AGREGAR MULTIMEDIA
                    ======================================-->
                    <div class="form-group agregarMultimedia"> 

                        <div class="row previsualizarImgFisico">

                          <?php


                              for ($i=0; $i <  count($photos); $i++) { 

                               

                                echo '
                                  <div class="col-md-3">
                                      <div class="thumbnail text-center" indice="'.$i.'">
                                
                                          <img class="imagenesRestantes" src="'.$photos[$i]["foto"].'" style="width:45%" >
                                          <div class="removerImagen" style="cursor:pointer">Remove file</div>
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
                <div>

            </div>
          
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="preload"></div>
          <?php
            echo '
                    <button type="button" class="btn btn-primary pull-left guardarClient"
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
          <h3 class="card-title">Vista Previa</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            
          </div>
        </div>
        <div class="card-body">
            <?php
              echo 

              '<div class="container-fluid" style="background:'.$section["backgroundcolor"].'" id="fondoClient">';

            ?>
                  <section id="customers">

			
                      <div class="container">

                          </br>
                          </br>
                          </br>
                            <!--Section heading-->
                          <h2 class="h2-responsive font-weight-bold text-center orange-text colorTitle titleClient"><?php echo $section["title"];  ?></h2>
                          </br>
                          <div id="previsualizacionCliente">
                            <?php

                                if($section["route"]=="customersSection"){

                                  // cuadricula

                                  echo '

                                      <div class="flex-center">

                                        <div class="row gridClient" >
                                      ';  
                                      
                                      for ($i=0; $i <  count($photos); $i++) { 
                                        echo '
                                          <div class="col-md-3 flex-center center-img" id="client'.$i.'"  index="'.$i.'" >
                                              <img src="'.$photos[$i]["foto"].'" class="imgClient wow fadeIn" data-wow-delay=".2s" id="'.$i.'">
                                          </div>
                                        ';
                                  }    
                                  echo '
                                        </div>

                                      </div>
                                  ';

                                


                                }else{

                                    // carrucel
                                    echo '
                                      
                                      <div class="customer-logos slider" id="div-logo" >
                                  
                                    ';
                                    
                                    for ($i=0; $i <  count($photos); $i++) { 


                                      echo '
                            
                                      <div class="slide center-img " id="slide'.$i.'"><img src="'.$photos[$i]["foto"].'" class="img-slider" style="display: block;margin-bottom: auto; margin-top: auto;"></div>
                            
                            
                                      ';
                            
                                            
                                    }

                                    echo '
                                      </div>
                                      <br>
                                    '; 

                                  }

                                


                            ?>     
                          </div>
                      </div>        
                  </section>
              </div>

        </div>
      </div>

      


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->