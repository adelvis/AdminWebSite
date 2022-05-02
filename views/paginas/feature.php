<?php

		
	$item = "type_block"; 

	$value = "feature";

  $section = ControllerSections::ctrGetBlocks($item, $value);


?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestor Caracteristicas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Gestor Caracteristicas</li>
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
          <h3 class="card-title">Bloque Caracteristicas</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            
          </div>
        </div>
        <div class="card-body">
            <form id="formFeature">
                <div class="row">
                    <div class="col-md-5 col-sm-12">

                        <div class="card card-warning card-outline">

                            <div class="card-header">
                                <h3 class="card-title">
                                  <i class="fas fa-edit"></i>
                                  Configuración Básica
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
                                                    img ="'.$section['img'].'"

                                                >Guardar Configuración</button>
                                            ';

                                      ?> 


                                </div>
                            </div>

                            <div class="card-body">
                                <!--==============================================
                                MODIFICAR EL TIPO DEL BLOQUE (Tarjetas -Listas)
                                ================================================--> 
                                <ph4>Seleccione el tipo de Bloque:</h4>
                                <div class="form-group">
                                    <?php
                                        if($section["route"] == "features"){

                                          echo ' <div class="icheck-primary icheck-inline selTypeBlock">
                                                  <input type="radio" value="features" id="radioCard" name="typeBlock" checked>
                                                  <label for="radioCard">
                                                    Tarjeta  
                                                  </label>
                                                  </div>



                                                  <div class="icheck-primary icheck-inline selTypeBlock">
                                                    <input type="radio" value="featureslist" id="radioLista" name="typeBlock">
                                                    <label for="radioLista">
                                                      Lista
                                                    </label>
                                                  </div>

                                                  <div class="icheck-primary icheck-inline selTypeBlock">
                                                    <input type="radio" value="featureslist2" id="radioLista2" name="typeBlock">
                                                    <label for="radioLista2">
                                                      Lista 2
                                                    </label>
                                                  </div>
                                                ';




                                        }elseif($section["route"] == "featureslist") {
                                          # code...
                                          echo ' <div class="icheck-primary icheck-inline selTypeBlock">
                                                  <input type="radio" value="features" id="radioCard" name="typeBlock">
                                                  <label for="radioCard">
                                                    Tarjeta  
                                                  </label>
                                                  </div>



                                                  <div class="icheck-primary icheck-inline selTypeBlock">
                                                    <input type="radio" value="featureslist" id="radioLista" name="typeBlock" checked>
                                                    <label for="radioLista">
                                                      Lista
                                                    </label>
                                                  </div>

                                                  <div class="icheck-primary icheck-inline selTypeBlock">
                                                    <input type="radio" value="featureslist2" id="radioLista2" name="typeBlock">
                                                    <label for="radioLista2">
                                                      Lista 2
                                                    </label>
                                                  </div>
                                                ';


                                        }else{

                                          echo ' <div class="icheck-primary icheck-inline selTypeBlock">
                                                  <input type="radio" value="features" id="radioCard" name="typeBlock">
                                                  <label for="radioCard">
                                                    Tarjeta  
                                                  </label>
                                                </div>



                                                <div class="icheck-primary icheck-inline selTypeBlock">
                                                  <input type="radio" value="featureslist" id="radioLista" name="typeBlock" >
                                                  <label for="radioLista">
                                                    Lista
                                                  </label>
                                                </div>

                                                <div class="icheck-primary icheck-inline selTypeBlock">
                                                  <input type="radio" value="featureslist2" id="radioLista2" name="typeBlock" checked>
                                                  <label for="radioLista2">
                                                    Lista 2
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
                                MODIFICAR  Decription
                                ======================================-->  
                                <?php
                                  if($section["route"] == "features"){

                                    echo '<div class="form-group descript">';

                                  }else{
                                    echo '<div class="form-group descript" style="display:none">';

                                  }
                                  
                                
                                ?>
                                
                                  <label>Descripción</label>
                                  <textarea class="form-control cambioDescripcion" rows="5" placeholder="Ingrese la Descripción ..."><?php echo 
                                  $section["description"]; ?></textarea>
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
                                                  <input type="checkbox" class="custom-control-input" id="switchPublic" >
                                                  <label class="custom-control-label" for="switchPublic">Publicar</label>
                                              </div>
                                            
                                            ';



                                        }


                                    ?>

                                </div>

                                 <!--==============================================
                                MODIFICAR IMAGEN
                                ================================================--> 
                                <?php
                                  if($section["route"] == "features"){

                                    echo '<div id ="imgPrincipal">';

                                  }else{
                                    echo '<div id ="imgPrincipal" style="display:none">';

                                  }
                                  
                                
                                ?>      

                                
                                
                                  <div class="form-group" id="loadImagen" >
                                      <label>Cambiar Imagen:</label>
                                      <br>
                                      <p class="help-block">
                                          <img src="<?php echo($section["img"]);  ?>" class="img-thumbnail previsualizarImagen" width="200px">
                                      </p>
                                      <input type="file" class="subirImgen" indice="'.$key.'">

                                      <p class="help-block">Tamaño recomendado 1366px / 768px (JPEG/PNG) </p>


                                  </div>  
                                </div>     
                            </div>

                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12">

                        <div class="card card-info card-outline">

                            <div class="card-header">
                                <h3 class="card-title">
                                  <i class="fas fa-edit"></i>
                                  Listado de Caracteristicas 
                                </h3>
                                <div class='btn-group' style="float: right;">
                                  <button type="button" class="btn btn-block btn-outline-secondary btnAddFeature" data-toggle='modal' data-target='#modalAddFeature'>Nueva Caracteristicas</button>
                                </div>

                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                     
                                    <table class="table table-bordered table-striped dt-responsive tablaFeature" width="100%">
                                         <thead>
                                   
                                             <tr>
                                             
                                               <th style="width:10px">#</th>
                                               <th>Titulo</th>
                                               <th>Descripción</th>
                                               <th>Icono</th>
                                               <th>Acciones</th>

                                             </tr> 

                                         </thead>   
                             
                                    </table>
                                                                  
                                 </div>


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
                    echo '
                        <!-- container -->
                        <div class="container pt-5 my-5" style="background:'.$section["backgroundcolor"].'" id="fondoBlock">';

              ?>     
              <!--Section: Content-->
              <?php
                  if($section["route"]=="features"){
                      echo '<section class="dark-grey-text" id="feature">';
                  }elseif($section["route"]=="featureslist"){
                      echo '<section class="p-md-3 mx-md-5" id="feature">';
                  }else {
                      echo '<section class="p-md-3 mx-md-5 text-lg-left" id="feature">';
                  }
              ?>
                  <!-- Section heading -->
                  <h2 class="text-center font-weight-bold mb-4 pb-2 colorTitle titleBlock"><?php echo $section["title"];  ?></h2>
                  <?php
                         $item="type";

                         $value="feature";
                   
                         $features = ControllerSections::ctrGetCategories($item, $value);
                    
                        /* ******************************************************+
                            feature
                        **************************************************************/
                        if($section["route"]=="features"){

                            echo '<div class="features">';
                        }else{

                          echo '<div class="features" style="display:none">';


                        }    
                        echo '

                            <!-- Section description -->
                            <p class="text-center lead grey-text mx-auto mb-5 descriptBlock">'.$section["description"].'</p>
                            <!-- Grid row -->
                            <div class="row">
                                <!-- Grid column -->
                                <div class="col-lg-5 text-center text-lg-left">
                                      <img class="img-fluid" src="'.$section["img"].'" alt="">                            
                                </div>
                                <!-- Grid column -->
                                <!-- Grid column -->
                                <div class="col-lg-7">
                        ';

                        foreach ($features as $key => $value) {

                          echo '
                                    <!-- Grid row -->
                                    <div class="row mb-3">
                
                                      <!-- Grid column -->
                                      <div class="col-1">
                                        <i class="fas fa-share fa-lg indigo-text"></i>
                                      </div>
                                      <!-- Grid column -->
                
                                      <!-- Grid column -->
                                      <div class="col-xl-10 col-md-11 col-10">
                                        <h5 class="font-weight-bold mb-3">'.$value["title"].'</h5>
                                        <p class="grey-text">'.$value["short_Description"].'</p>
                                      </div>
                                      <!-- Grid column -->
                
                                    </div>
                                    <!-- Grid row -->
                            ';
      
                        }

                        echo '
                                </div>
                            </div>                        
                        </div>
                        ';
                        /* ******************************************************+
                            featureList
                        **************************************************************/
                        if($section["route"]=="featureslist"){

                            echo '<div class="featureslist">';
                        }else{
                          echo '<div class="featureslist" style="display:none">';
                        }  
                        
                        echo '<br>
                              <div class="row">';

                       
                        foreach ($features as $key => $value) {
                              # code...
                              $style=json_decode($value["img"],true);
                              echo '

                                  <div class="col-lg-4 col-sm-6 mb-5">
                                    <h4 class="font-weight-bold mb-3">
                                      <i class="'.$style["img"].' pr-2" style="color:'.$style["color"].'"></i>'.$value["title"].'
                                    </h4>
                                    <p class="text-muted">
                                      '.$value["short_Description"].'
                                    </p>
                                  </div>';

                         }
                        
                     
                        

                        echo '
                                 </div>
                              <!-- /, div  featureslist-->  
                              </div>';

                        /* ******************************************************+
                            featureList2
                        **************************************************************/
                        if($section["route"]=="featureslist2"){

                          echo '<div class="featureslist2">';
                        }else{
                          echo '<div class="featureslist2" style="display:none">';
                        } 

                        echo '<div class="row text-center d-flex justify-content-center mb-4">';

                        foreach ($features as $key => $value) {

                          $style=json_decode($value["img"],true);
                          # code...
                          echo '
            
                                  <div class="col-lg-3 col-md-6 mb-lg-0 mb-5">
                                    <i class="fas '.$style["img"].' fa-3x mb-4" style="color:'.$style["color"].'"></i>
                                    <h4 class="font-weight-bold mb-4">'.$value["title"].'</h4>
                                    <p class="text-muted px-2 mb-lg-0">
                                      '.$value["short_Description"].'
                                    </p>
                                  </div>
            
            
                          ';
            
            
            
                        }




                        echo '  </div>
                              <!-- /, div  featureslist2-->
                              </div>'


                  ?>


              </section>
              </div>
              <!-- /. container -->
           
          </div>

      </div>
      <!-- /: Default box Pre-visualizaciòn-->
     
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<!--=====================================
MODAL EDITAR CARACTERISTICAS
======================================-->

<div id="modalEditFeature" class="modal fade" role="dialog">
    
    <div class="modal-dialog ">
      
      <div class="modal-content">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->
          <div class="modal-header" style="background:#3c8dbc; color:white">

              <h4 class="modal-title">Editar Caracteristicas</h4>
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
                    <input type="text" min="1" class="form-control titulo"   placeholder="Titulo" data-toggle="tooltip" title="Titulo">
                    <input type="hidden" class="idFeature">
                  </div>

                   <!-- Descripción -->
                  <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                        </div>
                        <textarea class="form-control cambioInformacion" rows="3" id="description" placeholder="Descripción" data-toggle="tooltip" title="Descripción"></textarea>
                        
                  </div>
                  <!-- Color Picker -->
                  <div class="form-group">
                        <label>Color del icono</label>

                        <div class="input-group my-colorpicker" id="iconColor">	      		
                            <input type="text" class="form-control my-colorpicker cambioColor" id="inputIcon" value="">

                            <div class="input-group-append">
                                <?php

                                  echo '<span class="input-group-text"><i class="fas fa-square" ></i></span>';
                                ?>
                            </div>      			
                        </div>

                  </div>
                   <!-- Imagen -->
                  <div class="form-group" id="loadImagen">

                    <label>Cambiar Icono:</label>
                    
                      <ul class="grid0" >
                          <?php

                              $item = null; 

                              $value = null;

                              $icons = ControllerSections::ctrGetIcons($item, $value);


                              foreach ($icons as $key => $value) {
                                # code...
                                

                                echo '<li class="col-md-3 col-sm-6 col-xs-12 iconSelecionado" code="'.$value['code'].'">'.$value['icon'].'</li>';

                              }



                          ?>

                          <!--<pre>
                            
                           <?php // var_dump($icons); ?>
                          </pre> -->
                                               


                      </ul>

                      <div class="IconSeleccion"> 
                          <label>Icono:</label>
                          <br>
                          <div class="text-center"  id="iconSel">
                            <i class=" fa-3x" id="icono"></i>
                            <input type="hidden" class="idIconCode"> 
                               
                          </div>      
                      </div>
                    
                  </div>

          </div>

           <!--=====================================
          PIE DEL MODAL
          ======================================-->
          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary guardarCambios">Guardar</button>
          </div>



      </div>
     
    </div> 
</div>   

<!--=====================================
MODAL AGREGAR CARACTERISTICAS
======================================-->

<div id="modalAddFeature" class="modal fade" role="dialog">
    
    <div class="modal-dialog ">
      
      <div class="modal-content">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->
          <div class="modal-header" style="background:#3c8dbc; color:white">

              <h4 class="modal-title">Agregar Caracteristicas</h4>
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
                    <input type="text" min="1" class="form-control titulo"   placeholder="Titulo" data-toggle="tooltip" title="Titulo">
                    
                  </div>

                   <!-- Descripción -->
                  <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                        </div>
                        <textarea class="form-control cambioInformacion" rows="3" id="description" placeholder="Descripción" data-toggle="tooltip" title="Descripción"></textarea>
                        
                  </div>
                  <!-- Color Picker -->
                  <div class="form-group">
                        <label>Color del icono</label>

                        <div class="input-group my-colorpicker" id="iconColor">	      		
                            <input type="text" class="form-control my-colorpicker cambioColor" id="inputIcon2" value="">

                            <div class="input-group-append">
                                <?php

                                  echo '<span class="input-group-text"><i class="fas fa-square" ></i></span>';
                                ?>
                            </div>      			
                        </div>

                  </div>
                   <!-- Imagen -->
                  <div class="form-group" id="loadImagen">

                    <label>Cambiar Icono:</label>
                    
                      <ul class="grid0" >
                          <?php

                              $item = null; 

                              $value = null;

                              $icons = ControllerSections::ctrGetIcons($item, $value);

                              foreach ($icons as $key => $value) {
                                # code...
                                

                                echo '<li class="col-md-3 col-sm-6 col-xs-12 iconSelecionado" code="'.$value['code'].'">'.$value['icon'].'</li>';

                              }



                          ?>


                      </ul>

                      <div> 
                          <label>Icono:</label>
                          <br>
                          <div class="text-center"  id="iconSel2">
                            <i class=" fa-3x" id="icono"></i>
                            <input type="hidden" class="idIconCode"> 
                               
                          </div>      
                      </div>
                    
                  </div>
                
           <!--=====================================
          PIE DEL MODAL
          ======================================-->
          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary addSave">Guardar</button>
          </div>



      </div>
     
    </div> 
</div>   
