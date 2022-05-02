<?php


	$template = ControllerCommerce::ctrSelectTemplate();


?>


<div class="card card-outline card-secondary">

	 <!--card-header -->
	 <div class="card-header">

	    <h3 class="card-title">LOGOTIPO</h3>
	    <div class="card-tools">
	       <!-- This will cause the card to collapse when clicked -->
	      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
	    </div>
	    <!-- /.card-tools -->
	 </div>   
	 <!-- /.card-header -->

	 <!-- card-body -->
	 <div class="card-body formularioInformacion">

	 	 <div class="form-group">

         	<label>Cambiar logotipo</label>
         	
			<p class="pull-right">
				
				<img src="<?php echo $template["logo"]; ?>" class="img-thumbnail previsualizarLogo" width="200px">

			</p>

			<input type="file" id="subirLogo">
			<p class="help-block">Tamaño recomendado 500px * 250px</p>

         </div>


	 </div>	
	 <!-- /.card-body -->
	 <!-- /.card-footer -->
	 <div class="card-footer">
          <button type="button" id="guardarLogo" class="btn btn-primary pull-right">Guardar Logotipo</button>

  	 </div>
  	<!-- /.card-footer -->


</div>

<div class="card card-outline card-info">

	 <!--card-header -->
	 <div class="card-header">

	    <h3 class="card-title">ICONO</h3>
	    <div class="card-tools">
	       <!-- This will cause the card to collapse when clicked -->
	      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
	    </div>
	    <!-- /.card-tools -->
	 </div>   
	 <!-- /.card-header -->

	 <!-- card-body -->
	 <div class="card-body formularioInformacion">

	 	  <div class="form-group">

         	<label>Cambiar Icono</label>
         	
			<p class="pull-right">
				
				<img src="<?php echo $template["icon"]; ?>" class="img-thumbnail previsualizarIcono" width="50px">

			</p>

			<input type="file" id="subirIcono">
			<p class="help-block">Tamaño recomendado 100px * 100px</p>

         </div>

	 </div>	
	 <!-- /.card-body -->
	 <!-- /.card-footer -->
	 <div class="card-footer">
           	<button type="button" id="guardarIcono" class="btn btn-primary pull-right">Guardar Icono</button>
  	 </div>
  	<!-- /.card-footer -->


</div>