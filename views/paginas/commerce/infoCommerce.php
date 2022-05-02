<?php

	
	$commerce = ControllerCommerce::ctrSelectCommerce();

	$contacto1 = json_decode($commerce["name_contact1"], true);

	$contacto2 = json_decode($commerce["name_contact2"], true);



?>


<div class="card card-outline card-primary">

  <div class="card-header">

	    <h3 class="card-title">INFORMACIÓN DEL COMERCIO</h3>
	    <div class="card-tools">
	       <!-- This will cause the card to collapse when clicked -->
	      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
	    </div>
	    <!-- /.card-tools -->
  </div>
  <!-- /.card-header -->
  <div class="card-body formularioInformacion">

  		<!-- Nombre -->  	
  		<div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-city"></i></span>
          </div>
          <input type="text" min="1" class="form-control cambioInformacion" id="nombre" value="<?php echo $commerce["name"]; ?>" placeholder="Nombre del Comercio" data-toggle="tooltip" title="Nombre del Comercio">
        </div>

 		<!-- Slongan -->
 		<div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-handshake"></i></span>
          </div>
          <input type="text" min="1" class="form-control cambioInformacion" id="slogan" value="<?php echo $commerce["slogan"]; ?>" placeholder="Eslogan" data-toggle="tooltip" title="Eslogan">
        </div>

        <!-- Email -->
 		<div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
          </div>
          <input type="email" min="1" class="form-control cambioInformacion" id="email" value="<?php echo $commerce["email_contact"]; ?>" placeholder="Email" data-toggle="tooltip" title="Email">
        </div>

        <!-- Direccion -->
 		<div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
          </div>
        	 <textarea class="form-control cambioInformacion" rows="2" id="direccion" placeholder="Dirección" data-toggle="tooltip" title="Dirección"><?php echo ltrim($commerce["address"]);?> </textarea>
					 
        </div>
        
        <!-- telefono -->
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-phone-square"></i></span>
          </div>
        	<input type="text" min="1" class="form-control cambioInformacion" id="telefono" value="<?php echo $commerce["phone_contact"]; ?>" placeholder="teléfono" data-toggle="tooltip" title="teléfono">
					 
        </div>

  		<!-- Horarios  -->
  		<div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
          </div>
        	<input type="text" min="1" class="form-control cambioInformacion" id="business_hours" value="<?php echo $commerce["business_hours"]; ?>" placeholder="Horarios" data-toggle="tooltip" title="Horarios">
					 
        </div>

        <div class="panel panel-default">
        	<div class="panel-body">
		    	<h6 class="text-uppercase">Información de Contacto 1</h6>

		    	<!-- nombre contacto 1  -->
		  		<div class="input-group mb-3">
		          <div class="input-group-prepend">
		            <span class="input-group-text"><i class="far fa-address-card"></i></span>
		          </div>
		        	<input type="text" min="1" class="form-control cambioInformacion" id="NombreContacto" value="<?php echo $contacto1["nombre"]; ?>" placeholder="nombre contacto 1" data-toggle="tooltip" title="nombre de contacto 1">
							 
		        </div>
		        <!-- cargo contacto 1  -->
		        <div class="input-group mb-3">
		          <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fa fa-graduation-cap"></i></span>
		          </div>
		        	<input type="text" min="1" class="form-control cambioInformacion" id="titulo" value="<?php echo $contacto1["titulo"]; ?>" placeholder="cargo contacto 1" data-toggle="tooltip" title="cargo de contacto 1">
							 
		        </div>

		    </div>
		 </div>

		 <div class="panel panel-default">
        	<div class="panel-body">
		    	<h6 class="text-uppercase">Información de Contacto 2</h6>

		    	<!-- nombre contacto 2  -->
		  		<div class="input-group mb-3">
		          <div class="input-group-prepend">
		            <span class="input-group-text"><i class="far fa-address-card"></i></span>
		          </div>
		        	<input type="text" min="1" class="form-control cambioInformacion" id="NombreContacto2" value="<?php echo $contacto1["nombre"]; ?>" placeholder="nombre contacto 2" data-toggle="tooltip" title="nombre de contacto 1">
							 
		        </div>
		        <!-- cargo contacto 2  -->
		        <div class="input-group mb-3">
		          <div class="input-group-prepend">
		            <span class="input-group-text"><i class="fa fa-graduation-cap"></i></span>
		          </div>
		        	<input type="text" min="1" class="form-control cambioInformacion" id="titulo2" value="<?php echo $contacto1["titulo"]; ?>" placeholder="cargo contacto 2" data-toggle="tooltip" title="cargo de contacto 1">
							 
		        </div>

		    </div>
		 </div>

  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <button type="button" id="guardarInformacion" class="btn btn-primary pull-right">Guardar</button>
  </div>
  <!-- /.card-footer -->
</div>
<!-- /.card -->

