<script>
  	$('.autocompleteOff').ready(function() {
        
        		$("#editPassword1").val("");
    			  $('#autocompleteOff').hide();
    });

</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Perfil de Usuario</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                    <?php

                    if($_SESSION["foto"] == ""){
                      echo '<img src="views/img/perfiles/default/anonymous.png" class="profile-user-img img-fluid img-circle" alt="User Image">';
                    }else{
                      echo '<img src="'.$_SESSION["foto"].'" class="profile-user-img img-fluid img-circle" alt="User Image">';
                    }

                    ?>	
                  
                </div>

                <h3 class="profile-username text-center"><?php echo $_SESSION["nombre"]; ?></h3>

                <p class="text-muted text-center"><?php echo $_SESSION["perfil"]; ?></p>

                <p class="text-muted text-center"><?php echo $_SESSION["email"]; ?></p>

                
                <?php
    
                    if($_SESSION["perfil"] == "administrador"){
                       echo ' 
                            <a href="usuarios" class="btn btn-primary btn-block"><b>Ir a usuario</b></a>

                            ';
                    }

               ?>         
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Perfil</a></li>
                  
                 
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="profile">

                      <form method="post" autocomplete="off" enctype="multipart/form-data" id="formProfile">
                        <div class="row">
                          <div class="col-md-4">
                              <!--==============================================
                                ENTRADA PARA SUBIR FOTO 
                              ================================================-->  
                              <div class="form-group" id="loadImagen">
                                  <label>Cambiar Imagen:</label>
                                  <br>
                                  <p class="help-block">
                                        <?php

                                        if($_SESSION["foto"] == ""){
                                          echo '<img src="views/img/perfiles/default/anonymous.png" class="img-thumbnail previsualizarImagen" alt="User Image" width="200px">';
                                        }else{
                                          echo '<img src="'.$_SESSION["foto"].'" class="img-thumbnail previsualizarImagen" alt="User Image" width="200px">';
                                        }

                                        ?>	
                                      
                                  </p>
                                  <input type="file" class="subirImgen" name="editPhoto">
                                  <input type="hidden" name="fotoActual" id="fotoActual" value="<?php echo $_SESSION["foto"]; ?>">
                                  <p class="help-block">Tamaño maximo 2 MB </p>

                              </div>

                          </div>
                          <div class="col-md-8">
                              <!--==============================================
                                ENTRADA PARA NOMBRE
                              ================================================-->  
                              <div class="input-group mb-3">
                                <label for="editName" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Ingresa el nombre" name="editName" id="editName"   value="<?php echo $_SESSION["nombre"]; ?>" readonly>
                                <input type="hidden" id="idPerfil" name="idPerfil" value="<?php echo $_SESSION["id"]; ?>">
                              </div>

                              <!--==============================================
                                ENTRADA PARA EL Email
                              ================================================-->
                              <div class="input-group mb-3">
                                <label for="editEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" placeholder="Email" name="editEmail" id="editEmail" value="<?php echo $_SESSION["email"]; ?>" required>
                              </div> 
                               <!--==============================================
                                ENTRADA PARA EL CONTRASEÑA
                              ================================================-->
                              <div class="input-group mb-3">
                                <label for="editPassword" class="col-sm-2 col-form-label">Contraseña</label>
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                        
                                	   
                                <div id="autocompleteOff" class="autocompleteOff" >
                                     <input type="password" autocomplete="OFF">
                                </div>
                                <input type="password" class="form-control" placeholder="Escriba la nueva contraseña" id="editPassword1" value="" autocomplete="off">
                                

                                <input type="hidden" id="editPassword" name="editPassword">
                                <input type="hidden" id="passwordActual" name="passwordActual" value="<?php echo $_SESSION["password"]; ?>">

                              </div> 

                              <input type="hidden" id="editProfile" name="editProfile" value="<?php echo $_SESSION["perfil"]; ?>">
                              
                              <br>
                              <button type="submit"  class="btn  btn-outline-secondary btn-md pull-right">
                                    Actualizar Datos
                              </button>
                          </div>
                          
                        </div>  
                          <?php

                            $editProfile = new ControllerUser();
                            $editProfile -> ctrEditProfile();

                          ?>
                      </form>
                  </div>
                
                  
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
 
</div>
<!-- ./wrapper -->
 