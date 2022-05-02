  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestor de Icono</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Gestor de Icono</li>
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
          <h3 class="card-title">Iconos</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            
          </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped dt-responsive tableIcons" width="100%">
                <thead>
                  
                    <th style="width: 10px">#</th>
                    <th>Clase</th>
                    <th>Iconos</th>
                    <th>Acciones</th>

                </thead>

            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          
          <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i> Agregar Icono</button>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!--=====================================
MODAL AGREGAR Icono
======================================-->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Agregar Icono</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="input-group mb-3">
            <a href="https://fontawesome.com/v5.15/icons?d=gallery&p=2&m=free" target="_blank" data-toggle="tooltip" title="Se recomienda solos iconos free">Ver iconos Font Awesome
            </a>
            </div>
            <!-- Titulo -->  	
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-paste"></i></span>
              </div>
              <input type="text" min="1" class="form-control icono"   placeholder="HTML del icono, ejemplo:<i class='fas fa-paste'></i>" data-toggle="tooltip" title="Ejemplo: <i class='fas fa-paste'></i>">
              <input type="hidden" class="idIconCode"> 
            </div>
            <div> 
                <label>Icono:</label>
                <br>
                <div class="text-center"  id="iconSel2">
                  <i class="fas fa-paste fa-5x"></i>
                </div>  
                <div id="iconoView" style="display:none"></div>    
            </div>
          

       
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btnaddIcon">Guardar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php

  $delete = new ControllerIcon();
  $delete->ctrDeleteIcon();



?>