<div class="card card-outline card-warning">

	 <!--card-header -->
	 <div class="card-header">

	    <h3 class="card-title">CONFIGURACIÓN BASICA DEL SITIO / PALETA DE COLORES</h3>
	    <div class="card-tools">
	       <!-- This will cause the card to collapse when clicked -->
	      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
	    </div>
	    <!-- /.card-tools -->
	 </div>   
	 <!-- /.card-header -->

	 <!-- card-body -->
	 <div class="card-body formularioInformacion">

	 	<!-- Nombre -->  	
  		<div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="far fa-edit"></i></span>
          </div>
          <input type="text" min="1" class="form-control cambioTitulo" id="tituloSite" value="<?php echo $template["title_Site"]; ?>" placeholder="Nombre del ComercioSitio Web" data-toggle="tooltip" title="Nombre del Sitio Web">
        </div>


	 	<!-- Color Picker -->
         <div class="form-group">
         	<label>Color de la Barra Superior</label>

         	<div class="input-group my-colorpicker" id="top_bar">	      		
			 	<input type="text" class="form-control my-colorpicker cambioColor" id="barraSuperior" value="<?php echo $template["top_bar"];   ?>">

			  	<div class="input-group-append">
                     <?php

	        	 		echo '<span class="input-group-text"><i class="fas fa-square" style="color:'.$template["top_bar"].' "></i></span>';
	        	 	?>
                </div>      			
	      	</div>

		</div>
		<!-- Color Picker -->
		<div class="form-group">
      
	  		<label>Color Texto de la Barra Superior:</label>

	      	<div class="input-group my-colorpicker" id="textSuperiorColor">
	        
	        	<input type="text" class="form-control my-colorpicker cambioColor" id="textoSuperior" value="<?php echo $template["top_text"];   ?>">

	        	<div class="input-group-append">
                    <?php

	        	 		echo '<span class="input-group-text"><i class="fas fa-square" style="color:'.$template["top_text"].' "></i></span>';
	        	 	?>
                </div> 

	      	</div>

	    </div>

	    <label>
			Barra Transparente: 
			<?php

				

				if ($template["transperent"]==1){

					

					echo ' <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxSuccess2 class="seleccionarTransp" validarTransparecia="1"  checked">
                        <label for="checkboxSuccess2">
                        </label>
                      </div>';



				}else{

					

					echo ' <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxSuccess2" class="seleccionarTransp"  validarTransparecia="0">
                        <label for="checkboxSuccess2">
                        </label>
                      </div>';
				}


			?>  
			
		</label>

		<!-- Color Picker -->
		<div class="form-group" >
	      
	      <label>Color de texto cuando la Barra esta transparente:</label>

	      <div class="input-group my-colorpicker" id="topTextTranspColor">
	        
	        <input type="text" class="form-control my-colorpicker cambioColor" id="topTextTransp" value="<?php echo $template["top_text_transp"];   ?>">

	        <div class="input-group-append">
                    <?php

	        	 		echo '<span class="input-group-text"><i class="fas fa-square" style="color:'.$template["top_text_transp"].' "></i></span>';
	        	 	?>
            </div> 


	      </div>

	    </div>
	    <!-- Color Picker -->
	    <div class="form-group">
	      
	      <label>Color de Pie de Pagina:</label>

	      <div class="input-group my-colorpicker" id="bottomBar">

	        <input type="text" class="form-control my-colorpicker cambioColor" id="bottom_bar" value="<?php echo $template["bottom_bar"];   ?>" class="form-control">

	        <div class="input-group-append">
                    <?php

	        	 		echo '<span class="input-group-text"><i class="fas fa-square" style="color:'.$template["bottom_bar"].' "></i></span>';
	        	 	?>
            </div> 


	      </div>

	    </div>	
		<!-- Color Picker --> 
		<div class="form-group">
      
	  		<label>Color Texto del Pie de Pagina/ Barra Inferior:</label>

	      	<div class="input-group my-colorpicker" id="bottonTextColor">
	        
	        	<input type="text" class="form-control my-colorpicker cambioColor" id="bottom_text" value="<?php echo $template["bottom_text"];   ?>">

	        	<div class="input-group-append">
                     <?php

	        	 		echo '<span class="input-group-text"><i class="fas fa-square" style="color:'.$template["bottom_text"].' "></i></span>';
	        	 	?>
            	</div> 

	      	</div>

	    </div>
	    
	    <div class="form-group">
	      
	      <label>Color de Barra Inferior:</label>

	      <div class="input-group my-colorpicker" id="footerColor">
	        
	        <input type="text" class="form-control my-colorpicker cambioColor" id="footer_color" value="<?php echo $template["footer_color"];   ?>">

	        <div class="input-group-append">
                    <?php

	        	 		echo '<span class="input-group-text"><i class="fas fa-square" style="color:'.$template["footer_color"].' "></i></span>';
	        	 	?>
            </div> 

	      </div>

	    </div>	

	     <div class="form-group">
      
	  		<label>Color Texto de los titulos de las Secciones:</label>

	      	<div class="input-group my-colorpicker" id="colorTitle">
	        
	        	<input type="text" class="form-control my-colorpicker cambioColor" id="title_text_color" value="<?php echo $template["title_text_color"];   ?>">

	        	 <div class="input-group-append">
	        	 	<?php

	        	 		echo '<span class="input-group-text"><i class="fas fa-square" style="color:'.$template["title_text_color"].' "></i></span>';
	        	 	?>
                      
            	 </div> 
	      	</div>

	    </div>



	 </div>	
	 <!-- /.card-body -->
	 <!-- /.card-footer -->
	 <div class="card-footer">
          <button type="button" id="guardarColores" class="btn btn-primary pull-right">Guardar Colores</button>
  	 </div>
  	<!-- /.card-footer -->


</div>