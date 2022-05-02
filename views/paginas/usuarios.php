 <?php
    if($_SESSION["perfil"] != "administrador"){
        echo '<script>      

              window.location = "inicio";

              </script> ';

       return;
    }
  
 ?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestor de Usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Gestor de Usuarios</li>
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
          <h3 class="card-title">Usuarios</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
           
            
          </div>
        </div>
        <div class="card-body">
             
              <table class="table table-bordered table-striped dt-responsive tableProfile" width="100%">
                
                <thead>
                  
                  <th style="width: 10px">#</th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Foto</th>
                  <th>Perfil</th>
                  <th>Estado</th>
                  <th>Acciones</th>

                </thead>

                <tbody>
                  
                  <?php

                        $item = null;
                        $value = null;

                        $perfiles = ControllerUser::ctrViewAdministrators($item, $value);
                        
                     
                        foreach ($perfiles as $key => $value) {

                              echo '<tr>
                                      <td>'.($key+1).'</td>
                                      <td>'.$value["name"].'</td>
                                      <td>'.$value["email"].'</td>';


                              if($value["photo"] != ""){

                                echo '<td><img src="'.$value["photo"].'" class="img-thumbnail" width="40px"></td>';


                              }else{

                                echo '<td><img src="views/img/perfiles/default/anonymous.png" class="img-thumbnail" width="40px"></td>';


                              }   

                              echo '<td>'.$value["profile"].'</td>';

                              if($value["state"] != 0){

                                echo '<td><button class="btn btn-success btn-xs btnActive" idPerfil="'.$value["id"].'" estadoPerfil="0">Activado</button></td>';

                              }else{

                                echo '<td><button class="btn btn-danger btn-xs btnActive" idPerfil="'.$value["id"].'" estadoPerfil="1">Desactivado</button></td>';

                              } 

                              echo '<td>

                                    <div class="btn-group">
                                        
                                      <button class="btn btn-warning btnEditProfile" idPerfil="'.$value["id"].'" data-toggle="modal" data-target="#modalEditUser"><i class="fas fa-pencil-alt"></i></button>

                                      <button class="btn btn-danger btnDeleteProfile" idPerfil="'.$value["id"].'" fotoPerfil="'.$value["photo"].'"><i class="fa fa-times"></i></button>

                                    </div>  

                                  </td>

                                </tr>';    





                        
                        }




                  ?>




                </tbody>




              </table>
        </div>
        <!-- /.card-body -->
        
        <div class="card-footer clearfix">
                <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modalAddUser"><i class="fas fa-plus"></i> Agregar Usuario</button>
        </div>
 
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!--==============================================
  MODAL PARA AGREGAR UN USUARIO
================================================--> 
<div class="modal fade" id="modalAddUser">
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="modal-header">
                <h4 class="modal-title">Agregar un Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                      <!--==============================================
                        ENTRADA PARA EL NOMBRE 
                      ================================================--> 
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Ingresa el nombre" name="newName" required>
                      </div>
                      <!--==============================================
                        ENTRADA PARA EL Email
                      ================================================-->
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" placeholder="Email" name="newEmail" required>
                      </div> 
                      <!--==============================================
                        ENTRADA PARA EL CONTRASEÑA
                      ================================================-->
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="Password" name="newpassword" required>
                      </div> 
                      <!--==============================================
                        ENTRADA PARA EL PERFIL
                      ================================================--> 
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-address-book"></i></span>
                        </div>
                        <select class="custom-select" name="newProfile">
                            <option value="">Selecionar perfil</option>
                            <option value="administrador">Administrador</option>
                            <option value="editor">Editor</option>
                        </select>

                      </div>  
                      <!--==============================================
                        ENTRADA PARA SUBIR FOTO 
                      ================================================-->  
                      <div class="form-group" id="loadImagen">
                          <label>Cambiar Imagen:</label>
                          <br>
                          <p class="help-block">
                              <img src="views/img/perfiles/default/anonymous.png" class="img-thumbnail previsualizarImagen" width="200px">
                          </p>
                          <input type="file" class="subirImgen" name="newPhoto">
                          <p class="help-block">Tamaño maximo 2 MB </p>

                      </div>
                

              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
                
              </div>

              <?php

                $createProfile = new ControllerUser();
                $createProfile -> ctrCreateProfile();

              ?>

            </form>
          
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!--==============================================
  MODAL PARA EDITAR UN USUARIO
================================================--> 
<div class="modal fade" id="modalEditUser">
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="modal-header">
                <h4 class="modal-title">Editar un Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                      <!--==============================================
                        ENTRADA PARA EL NOMBRE 
                      ================================================--> 
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Ingresa el nombre" name="editName" id="editName"  required>
                        <input type="hidden" id="idPerfil" name="idPerfil">
                      </div>
                      <!--==============================================
                        ENTRADA PARA EL Email
                      ================================================-->
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" placeholder="Email" name="editEmail" id="editEmail" required>
                      </div> 
                      <!--==============================================
                        ENTRADA PARA EL CONTRASEÑA
                      ================================================-->
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="Escriba la nueva contraseña" id="editPassword1" >

                        <input type="hidden" id="editPassword" name="editPassword">
                        <input type="hidden" id="passwordActual" name="passwordActual">

                      </div> 
                      <!--==============================================
                        ENTRADA PARA EL PERFIL
                      ================================================--> 
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-address-book"></i></span>
                        </div>
                        <select class="custom-select" name="editProfile">
                            <option value="" id="editProfile"></option>
                            <option value="administrador">Administrador</option>
                            <option value="editor">Editor</option>
                        </select>

                      </div>  
                      <!--==============================================
                        ENTRADA PARA SUBIR FOTO 
                      ================================================-->  
                      <div class="form-group" id="loadImagen">
                          <label>Cambiar Imagen:</label>
                          <br>
                          <p class="help-block">
                              <img src="views/img/perfiles/default/anonymous.png" class="img-thumbnail previsualizarImagen" width="200px">
                          </p>
                          <input type="file" class="subirImgen" name="editPhoto">
                          <input type="hidden" name="fotoActual" id="fotoActual">
                          <p class="help-block">Tamaño maximo 2 MB </p>

                      </div>
                

              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
                
              </div>

              <?php

                $editProfile = new ControllerUser();
                $editProfile -> ctrEditProfile();

              ?>

            </form>
          
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php

  $deleteProfile = new ControllerUser();
  $deleteProfile -> ctrDeletePerfil();

?> 