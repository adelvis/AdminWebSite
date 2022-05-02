<?php
    if($_SESSION["perfil"] != "administrador"){
        echo '<script>      

              window.location = "inicio";

              </script> ';

      return;
    }
    $sections = ControllerSections::ctrGetSections();

    //var_dump($sections);

    $block = ControllerSections::ctrGetBlocksNotPublished();
   

?>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestor Secciones</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Gestor Secciones</li>
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
          <h3 class="card-title">Secciones de la Pagina Web</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            
          </div>
        </div>
        <div class="card-body">
          
             <!-- TO DO List -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  Secciones Activas o publicadas (<small>Para cambiar la posición de un bloque, solo seleccionelo y arrastrelo a la posición deseada</small> )
                </h3>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <ul class="todo-list" data-widget="todo-list">

                  <?php

                      foreach ($sections as $key => $value) {

                        $title = ($value['navbar_title'] != '')? $value['navbar_title'] : $value['route'] ;

                        echo '
                        
                        <li class="itemList" id="'.$value["id"].'">
                            <!-- drag handle -->
                            <span class="handle">
                              <i class="fas fa-ellipsis-v"></i>
                              <i class="fas fa-ellipsis-v"></i>
                            </span>
                            <!-- todo text -->
                            <span class="text">'.$title.'</span>
                            <!-- Emphasis label -->
                            <small class="badge badge-success"><i class="far fa-clock"></i> Publicado</small>
                            <!-- General tools such as edit or delete-->
                            <div class="tools">
                              <button type="button" class="btn btn-warning btnEditSection" id="'.$value["id_block"].'" data-toggle="modal" data-target="#modalEdit">
                              <i class="fas fa-edit"></i> </button>
                              <i class="fas fa-trash-o"></i>
                            </div>
                        </li>
                        
                        
                        
                        ';
                      }
                  ?>
                
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-plus"></i> Publicar Bloque</button>
              </div>
            </div>
            <!-- /.card -->







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

  
<!--==============================================
  MODAL QUE MODIFICA published
================================================--> 
<div class="modal fade" id="modalEdit">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Actualización de Estatus de Publicación</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
                <!--==============================================
                  MODIFICAR published
                ================================================--> 
                <div class="form-group" id="status">

                </div>


            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary updatePublished">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!--==============================================
  MODAL QUE AGREGA UNA SECCION published
================================================--> 
<div class="modal fade" id="modalAdd">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Actualización de un Bloque a publicado</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    <!--==============================================
                      Bloque sin published
                    ================================================--> 
                    <div class="form-group">
                        <label>Selecciona el bloque a publicar</label>
                        <select class="selectBlock">
                              <option value="">Selecionar Bloque</option>
                              <?php
                                foreach ($block as $key => $val) {
                                  # code...
                                  $option = ($val['navbar_title'] != '')? $val['navbar_title'] : $val['route'] ;
                                  echo '<option value="'.$val["id"].'">'.$option.'</option>';
                                }

                              ?>

                        </select>
                    </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary addPublished">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
<!-- /.modal -->