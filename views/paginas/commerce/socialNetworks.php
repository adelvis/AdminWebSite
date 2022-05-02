<?php


	$template = ControllerCommerce::ctrSelectTemplate();

	$socialNetwork = json_decode($template["social_networks"], true);

	
	
	if (is_null($socialNetwork)){

		$json = '[{"red":"fa-facebook-f","estilo":"facebookBlanco","url":"http://facebook.com/","activo":0},{"red":"fa-youtube","estilo":"youtubeBlanco","url":"http://youtube.com/","activo":0},{"red":"fa-twitter","estilo":"twitterBlanco","url":"http://twitter.com/","activo":0},{"red":"fa-google-plus-g","estilo":"google-plusBlanco","url":"http://google.com/","activo":0},{"red":"fa-instagram","estilo":"instagramBlanco","url":"http://instagram.com/","activo":0}]'; 

		$socialNetwork =json_decode($json, true);
	}



?>

<div class="card card-outline card-success">

	 <!--card-header -->
	 <div class="card-header">

	    <h3 class="card-title">REDES SOCIALES</h3>
	    <div class="card-tools">
	       <!-- This will cause the card to collapse when clicked -->
	      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
	    </div>
	    <!-- /.card-tools -->
	 </div>   
	 <!-- /.card-header -->

	 <!-- card-body -->
	 <div class="card-body formularioInformacion">


		<div class="form-group clearfix">

	          <div class="icheck-primary icheck-inline">
	            <input type="radio" value="color" id="radioPrimary1" name="colorRedSocial">
	            <label for="radioPrimary1">
	            	Color 
	            </label>
	          </div>

	          <div class="icheck-primary icheck-inline">
	            <input type="radio" value="blanco" id="radioPrimary2" name="colorRedSocial">
	            <label for="radioPrimary2">
	            	Blanco 
	            </label>
	          </div>

	          <div class="icheck-primary icheck-inline">
	            <input type="radio" value="negro" id="radioPrimary3" name="colorRedSocial">
	            <label for="radioPrimary3">
	            	Negro 	              
	            </label>
	          </div>
        </div>


        <?php

        	$i =0;


			foreach ($socialNetwork as $key => $value) {

				$i = $i + 1;


				# code...
			
				echo '

					<div class="form-group row">
		
						<div class="col-xs-6">

							<div class="input-group mb-3" >

					          <div class="input-group-prepend">
					            <span class="input-group-text"><i class="fab '.$value["red"].' '.$value["estilo"] .' redSocial"></i></span>
					          </div>

					          <input type="text" min="1" class="form-control input-lg cambiarUrlRed" value="'.$value["url"].'" style="width: 500px;">
					        </div>
							

						</div>

						<div class="col-xs-2">';




				

						if($value["activo"] !=0){

							echo '<div class="icheck-primary" style="margin-left: 20px;">
			                        <input type="checkbox" id= "checkboxPrimary'.$i.'" class="seleccionarRed" ruta="'.$value["url"].'" red="'.$value["red"].'" estilo="'.$value["estilo"].'" validarRed="'.$value["red"].'" checked>
			                        <label for="checkboxPrimary'.$i.'">
			                        </label>
			                      </div>';

							

						}else{


							echo '<div class="icheck-primary" style="margin-left: 20px;">
			                        <input type="checkbox" id= "checkboxPrimary'.$i.'" class="seleccionarRed" ruta="'.$value["url"].'" red="'.$value["red"].'" estilo="'.$value["estilo"].'" validarRed="'.$value["red"].'">
			                        <label for="checkboxPrimary'.$i.'">
			                        </label>
			                      </div>';


						}


						echo '</div>


					</div>

					



				';


			}

		?>
		

		<input type="hidden" id="valorRedesSociales" value="<?php echo $template["social_networks"];   ?>">

		

	 </div>	
	 <!-- /.card-body -->
	 <!-- /.card-footer -->
	 <div class="card-footer">
           <button type="button" id="guardarRedesSociales" class="btn btn-primary pull-right">Guardar</button>
  	 </div>
  	<!-- /.card-footer -->


</div>