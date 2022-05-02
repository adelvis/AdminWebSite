<?php

		
	$item = "type_block"; 

	$value = "service";

	$section = ControllerSections::ctrGetBlocks($item, $value);


  


?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestor Servicios</h1>
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
            <h3 class="card-title">Bloque Servicios</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>          
            </div>
          </div>
          <div class="card-body">
              <form id="formServices">
                <div class="row">
                  <div class="col-md-5 col-sm-12">
                        <!--==============================================
                        MODIFICAR EL TIPO DEL BLOQUE (Tarjetas -CARRUSEL)
                        ================================================--> 

                        <div class="card card-warning card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                  <i class="fas fa-edit"></i>
                                  Configuración Basica
                                </h3>
                                <div class='btn-group' style="float: right;">
                                  
                                    <?php
                                        echo '
                                                <button type="button" class="btn btn-block btn-outline-warning guardaConfigBlock "
                                                    id="'.$section["id"].'"
                                                    title ="'.$section["title"].'"
                                                    route ="'.$section["route"].'"
                                                    navbar_title ="'.$section["navbar_title"].'"
                                                    path_navbar ="'.$section["path_navbar"].'"
                                                    description="'.$section["description"].'"
                                                    backgroundcolor = "'.$section["backgroundcolor"].'"
                                                    published = "'.$section["published"].'"
                                                    type_block = "'.$section["type_block"].'"

                                                >Guardar Configuración</button>
                                            ';

                                      ?> 


                                </div>
                            </div>
                            <div class="card-body">
                                   <!--==============================================
                                    MODIFICAR EL TIPO DEL BLOQUE (Tarjetas -CARRUSEL)
                                    ================================================--> 
                                    <ph4>Seleccione el tipo de Bloque:</h4>
                                    <div class="form-group">

                                          <?php

                                            if($section["route"] == "servicesSectionCard"){

                                                echo ' <div class="icheck-primary icheck-inline selTypeBlock">
                                                        <input type="radio" value="servicesSectionCard" id="radioGrilla" name="typeBlock" checked>
                                                        <label for="radioGrilla">
                                                          Tarjetas 
                                                        </label>
                                                        </div>



                                                        <div class="icheck-primary icheck-inline selTypeBlock">
                                                          <input type="radio" value="servicesSectionCar" id="radioCarrucel" name="typeBlock">
                                                          <label for="radioCarrucel">
                                                            Carrusel
                                                          </label>
                                                        </div>

                                                        <div class="icheck-primary icheck-inline selTypeBlock">
                                                          <input type="radio" value="servicesSectionCardDark" id="radioCarrucel2" name="typeBlock">
                                                          <label for="radioCarrucel2">
                                                            Tarjetas Oscuras
                                                          </label>
                                                        </div>
                                                  ';


                                            }elseif($section["route"] == "servicesSectionCar"){

                                              echo ' <div class="icheck-primary icheck-inline selTypeBlock">
                                                        <input type="radio" value="servicesSectionCard" id="radioGrilla" name="typeBlock">
                                                        <label for="radioGrilla">
                                                          Tarjetas
                                                        </label>
                                                      </div>

                                                      <div class="icheck-primary icheck-inline selTypeBlock">
                                                        <input type="radio" value="servicesSectionCar" id="radioCarrucel" name="typeBlock" checked>
                                                        <label for="radioCarrucel">
                                                          Carrusel
                                                        </label>
                                                      </div>

                                                      <div class="icheck-primary icheck-inline selTypeBlock">
                                                          <input type="radio" value="servicesSectionCardDark" id="radioCarrucel2" name="typeBlock">
                                                          <label for="radioCarrucel2">
                                                            Tarjetas Oscuras
                                                          </label>
                                                      </div>

                                                      ';
                                            }else{

                                              echo ' <div class="icheck-primary icheck-inline selTypeBlock">
                                                      <input type="radio" value="servicesSectionCard" id="radioGrilla" name="typeBlock" >
                                                      <label for="radioGrilla">
                                                        Tarjetas
                                                      </label>
                                                    </div>

                                                    <div class="icheck-primary icheck-inline selTypeBlock">
                                                      <input type="radio" value="servicesSectionCar" id="radioCarrucel" name="typeBlock" >
                                                      <label for="radioCarrucel">
                                                        Carrusel
                                                      </label>
                                                    </div>

                                                    <div class="icheck-primary icheck-inline selTypeBlock">
                                                        <input type="radio" value="servicesSectionCardDark" id="radioCarrucel2" name="typeBlock" checked>
                                                        <label for="radioCarrucel2">
                                                          Tarjetas Oscuras
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



                                    </div>

                            </div>
                          <!-- /.card -->
                        </div>

                

                  <div class="col-md-7 col-sm-12">

                        <div class="card card-info card-outline">
                              <div class="card-header">
                                <h3 class="card-title">
                                  <i class="fas fa-edit"></i>
                                  Listado de Servicios 
                                </h3>
                                <div class='btn-group' style="float: right;">
                                  <button type="button" class="btn btn-block btn-outline-secondary btnAddService" data-toggle='modal' data-target='#modalAddService'>Nuevo Servicio</button>
                                </div>
                              </div>
                              <div class="card-body">
                                  <div class="form-group">
                                     
                                      <table class="table table-bordered table-striped dt-responsive tablaServicios" width="100%">
                                          <thead>
                                    
                                              <tr>
                                              
                                                <th style="width:10px">#</th>
                                                <th>Titulo</th>
                                                <th>Descripción</th>
                                                <th>Foto Principal</th>
                                                <th>Acciones</th>

                                              </tr> 

                                          </thead>   
                              
                                      </table>
                                                                   
                                  </div>

                              </div>
                        </div>    
                     
                  </div>  
              </form>        
          </div>
        <!-- /.card-body -->
         
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

                    '<div class="container" style="background:'.$section["backgroundcolor"].'" id="fondoBlock">';

              ?>
                  <!--Section: Content-->
                  <section class="text-center dark-grey-text mb-5" id = "service"> 
                      <div class="container">
                             <!--Section heading-->
                            <h2 class="h2-responsive font-weight-bold text-center colorTitle titleBlock"><?php echo $section["title"];  ?></h2>
                            </br>
                            <?php
                              $item="type";

                              $value="service";
                        
                              $services = ControllerSections::ctrGetCategories($item, $value);
                              
                              /* ******************************************************+
                                  servicesSectionCardDark
                              **************************************************************/
                              if($section["route"]=="servicesSectionCardDark"){

                                echo '
                                    <!-- card of service -->
                                    <div class="row row-cols-1 row-cols-md-4" id="servCardDark">';

                              }else{

                                echo '
                                    <!-- card of service -->
                                    <div class="row row-cols-1 row-cols-md-4" id="servCardDark" style="display:none">';

                              }  
                              
                              foreach ($services as $key => $value) {

                                    echo '

                                          <!-- Card Dark -->
                                          <div class="col mb-4">
                                            <div class="card h-100">

                                                <!-- Card image -->
                                                <div class="view" style="height:190px;">
                                                  <img class="card-img-top imgService" src="'.$value["img"].'"
                                                    alt="Card image cap" style="height:100%">
                                                  <a>
                                                    <div class="mask rgba-white-slight"></div>
                                                  </a>
                                                </div>
                                                                            
                                                 
                                                <!-- Card content -->
                                                <div class="card-body elegant-color white-text rounded-bottom" style ="text-align:center;" >

                                                
                                                  <!-- Title -->
                                                  <div class="cardTitle">
                                                  <a> <h4 class="card-title"  style="margin: auto;">'.$value["title"].'</h4> </a>
                                                  </div>
                                                  <hr class="hr-light">
                                                  
                                                  <!-- Text -->
                                                  <p class="card-text white-text mb-4">'.$value["short_Description"].'</p>
                                                

                                                </div>
                                            </div>
                                          </div>	
                                        
                                          <!-- Card Dark -->

                                    ';
                              }

                              echo '
                                    <!-- end card of service -->
                                    </div>
                              ';

                              /* ******************************************************+
                                  servicesSectionCard
                              **************************************************************/
                              if($section["route"]=="servicesSectionCard"){
                                    echo '
                                    <!-- card of service -->
                                    <div class="row row-cols-1 row-cols-md-4" id="servCard">';

                              }else{

                                echo '
                                    <!-- card of service -->
                                    <div class="row row-cols-1 row-cols-md-4" id="servCard" style="display:none">';

                              } 

                              foreach ($services as $key => $value) {

                                echo '	
                                            <!-- Card -->
                                            <div class="col mb-4" >
                                                <div class="card h-100">
        
                                                    <!-- Card image -->
                                                    <div class="view  z-depth-1-half" style="height:190px;">
                                                      <img src="'.$value["img"].'" class="card-img-top imgService" alt="" style="height:100%" >
                                                      <div class="mask rgba-white-slight"></div>
                                                      
                                                      
                                                    </div>
        
                                                    <!-- Card content -->
                                                    <div class="card-body" style ="text-align:center;">
                              
                                                      <!-- Title -->
                                                      <div class="cardTitle">
                                                        <h4 class="card-title"><a>'.$value["title"].'</a></h4>
                                                      </div>
                                                        <!-- Text -->
                                                      <p class="card-text">'.$value["short_Description"].'</p>
                              
                                                      
                                                    
                                                    </div>
        
                                                </div>
                                            </div>	
                                            <!-- Card -->
                            
                                ';	
                              }
                              
                              echo '
                                    <!-- end card of service -->
                                    </div>
                              ';

                              /* ******************************************************+
                                  servicesSectionCar
                              **************************************************************/
                              if($section["route"]=="servicesSectionCar"){
                                echo '
                                     <!-- card of service -->
                                     <div id="carousel-example" class="carousel slide" data-ride="carousel">
                                ';

                              }else{

                                echo '
                                    <!-- card of service -->
                                    <div id="carousel-example" class="carousel slide" data-ride="carousel" style="display:none"> ';

                              }

                              echo '
                                      <!--Controls-->
                                      <div class="controls-top">
                                          <a class="btn-floating mb-4 ml-4" href="#carousel-example" data-slide="prev"><i
                                              class="fas fa-chevron-left"></i></a>
                            
                            
                                          <a class="btn-floating mb-4 ml-4" href="#carousel-example" data-slide="next"><i
                                              class="fas fa-chevron-right"></i></a>
                                      </div>
                                      <!--/.Controls-->
                          
                              
                                  ';

                              echo '
                                      <!-- Card deck -->
                                      <div class="my-flex-card">	  
                            
                                              <div class="carousel-inner row w-100 mx-auto" role="listbox">
                    
                              
                              ';


                              $flagActivo = 0;

                              foreach ($services as $key => $value) {
                                # code...
                              
                                if($flagActivo == 0) {

                                  $flagActivo =1;
                                  echo ' 
                                        <div class="carousel-item  carousel-item-serv col-12 col-sm-6 col-md-4 col-lg-3 active">
                                            <div class="card mb-2">
                                                <img class="card-img-top carousel-image" src="'.$value["img"].'" alt="Card image cap">
                                                <div class="card-body">
                                                    <h4 class="card-title font-weight-bold">'.$value["title"].'</h4>
                                                    <p class="card-text">'.$value["short_Description"].'</p>
                                              
                                                </div>
                                            </div>
                                        </div>';

                                }else{

                                  			# code...
			                		      echo '

                                        <div class="carousel-item carousel-item-serv col-12 col-sm-6 col-md-4 col-lg-3">
                                            <div class="card mb-2">
                                              <img class="card-img-top carousel-image" src="'.$value["img"].'" alt="Card image cap">
                                              <div class="card-body">
                                                <h4 class="card-title font-weight-bold">'.$value["title"].'</h4>
                                                <p class="card-text">'.$value["short_Description"].'</p>
                                                
                                              </div>
                                            </div>
                                        </div>';




                                }

                              }

                              echo '

                                              </div>
                                      </div>
                                      <!-- Card deck -->
                                                 
                              ';
                              echo '
                                    <!-- end card of service -->
                                    </div>
                              ';



                             
                              

                            ?>  
                            
                                                        
                            


                      </div>
                  </section>    
                  <!-- /.section -->    

              <br>                  
              </div>
              <!-- /.container -->

          </div>


      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<!--=====================================
MODAL EDITAR SERVICIO
======================================-->

<div id="modalEditService" class="modal fade" role="dialog">
    
    <div class="modal-dialog ">
      
      <div class="modal-content">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->
          <div class="modal-header" style="background:#3c8dbc; color:white">

              <h4 class="modal-title">Editar Servicio</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>

          </div>

           <!--=====================================
          CUERPO DEL MODAL
          ======================================-->

          <div class="modal-body">
                  <!-- Titulo -->  	
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-handshake"></i></span>
                    </div>
                    <input type="text" min="1" class="form-control titulo"   placeholder="Titulo del servicio" data-toggle="tooltip" title="Titulo del servicio">
                    <input type="hidden" class="idServicio">
                  </div>

                   <!-- Descripción -->
                  <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                        </div>
                        <textarea class="form-control cambioInformacion" rows="3" id="description" placeholder="Descripción" data-toggle="tooltip" title="Descripción"></textarea>
                        
                  </div>
                   <!-- Imagen -->
                  <div class="form-group" id="loadImagen">

                    <label>Cambiar Imagen:</label>

                    <br>

                    <p class="help-block">
                        <img src="views/img/services/default.jpg" class="img-thumbnail previsualizarImagen" width="200px">
                    </p>

                    <input type="file" class="subirImagen">
                    <input type="hidden" class="antiguaFotoPortada">

                    <p class="help-block">Tamaño recomendado 1366px / 768px (JPEG/PNG) </p>

                  </div>

          </div>

           <!--=====================================
          PIE DEL MODAL
          ======================================-->
          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary guardarCambiosServicio">Guardar</button>
          </div>



      </div>
     
    </div> 
</div>   

<!--=====================================
MODAL AGREGAR UN SERVICIO
======================================-->

<div id="modalAddService" class="modal fade" role="dialog">
    
    <div class="modal-dialog ">
      
      <div class="modal-content">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->
          <div class="modal-header" style="background:#3c8dbc; color:white">

              <h4 class="modal-title">Agregar Servicio</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>

          </div>

           <!--=====================================
          CUERPO DEL MODAL
          ======================================-->

          <div class="modal-body">
                  <!-- Titulo -->  	
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-handshake"></i></span>
                    </div>
                    <input type="text" min="1" class="form-control titulo"  placeholder="Titulo del servicio" data-toggle="tooltip" title="Titulo del servicio">
                    
                  </div>

                   <!-- Descripción -->
                  <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                        </div>
                        <textarea class="form-control cambioInformacion" rows="3" id="description" placeholder="Descripción" data-toggle="tooltip" title="Descripción"></textarea>
                        
                  </div>
                   <!-- Imagen -->
                  <div class="form-group" id="loadImagen">

                    <label>Cambiar Imagen:</label>

                    <br>

                    <p class="help-block">
                        <img src="views/img/services/default.jpg" class="img-thumbnail previsualizarImagen" width="200px">
                    </p>

                    <input type="file" class="subirImagen">
                   

                    <p class="help-block">Tamaño recomendado 1366px / 768px (JPEG/PNG) </p>

                  </div>

          </div>

           <!--=====================================
          PIE DEL MODAL
          ======================================-->
          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary guardarServicio">Guardar</button>
          </div>



      </div>
     
    </div> 
</div>   


