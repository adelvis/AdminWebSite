<?php

		
	$item = "type_block"; 

	$value = "streak";

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
            <h1>Gestor Streak</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Gestor Streak</li>
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
          <h3 class="card-title">Streak</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            
          </div>
        </div>
        <div class="card-body">
            <form id="formStreak">
                <div class="row">
                    <div class="col-md-5 col-sm-12">
                        <!--=====================================
                        MODIFICAR  TITULO
                        ======================================--> 
                        <div class="form-group">

                              <label>Autor:</label>

                              <input type="text" class="form-control cambioTitle"  value="<?php echo $section["title"]; ?>">
                        </div>

                         <!--=====================================
                        MODIFICAR  Decription                     
                        ======================================-->   
                        <div class="form-group">
                              <label>Pensamiento</label>                      
                              <textarea class="form-control cambioDescripcion" rows="7" placeholder="Ingrese la frace ..." ><?php echo 
                              $section["description"]; ?></textarea>


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

                         <!--==============================================
                        MODIFICAR IMAGEN
                        ================================================-->    
                        <div class="form-group" id="loadImagen">

                            <label>Cambiar Fondo:</label>

                            <br>

                            <p class="help-block">
                                <img src="<?php echo($section["img"]);  ?>" class="img-thumbnail previsualizarImagen" width="200px">
                            </p>

                            <input type="file" class="subirImgen" indice="'.$key.'">

                            <p class="help-block">Tamaño recomendado 1366px / 768px (JPEG/PNG) </p>

                        </div>
                    </div>
                </div>    


            </form>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        <?php
              echo '
                      <button type="button" class="btn btn-primary pull-left guardarStreak"
                          id="'.$section["id"].'"
                          title ="'.$section["title"].'"
                          route ="'.$section["route"].'"
                          description="'.$section["description"].'"
                          img = "'.$section["img"].'"
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
              <h3 class="card-title">Vista Previa </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                
              </div>
            </div>
        <div class="card-body">
            <?php

                echo '

                <input type="hidden" id="urlStreak"  value="'.$section["img"].'">
                <div class="streak_custom" >';

            ?>
            <!-- Streak -->

	
                    <div class="flex-center mask rgba-indigo-strong">
                      <div class="text-center white-text ml-4 mr-4">
                        <h2 class="h2-responsive mb-5 descriptBlock"><i class="fas fa-quote-left" aria-hidden="true"></i><?php echo $section["description"]; ?><i class="fas fa-quote-right" aria-hidden="true"></i></h2>
                        <h5 class="text-center font-italic wow fadeIn" id="autor" data-wow-delay="0.2s" style="visibility: visible; animation-name: fadeIn; animation-delay: 0.2s;">~ <?php echo $section["title"]; ?></h5>
                      </div>
                    </div>
              
                </div>
          <!-- Streak -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->