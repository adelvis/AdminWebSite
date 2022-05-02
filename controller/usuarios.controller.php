<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
/**
 * Controller User
 */
class ControllerUser
{
	
	
	public function ctrAccessAdministrator(){


		if(isset($_POST["ingEmail"])){

			


			if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingEmail"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

				$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$table ="administrators";
				$item= "email";
				$value =$_POST["ingEmail"];
					
				//var_dump("pase el primer filtro");
				
				$answer = ModelUser::MdlMostrarUsuarios($table, $item, $value);
				//var_dump($answer);
				

				if ($answer["email"] == $_POST["ingEmail"] && $answer["password"]== $encriptar){

					if($answer["state"] ==1){


						$_SESSION["iniSesion"] = "ok";
						$_SESSION["id"] = $answer["id"];
						$_SESSION["nombre"] = $answer["name"];
						$_SESSION["foto"] = $answer["photo"];
						$_SESSION["email"] = $answer["email"];
						$_SESSION["password"] = $answer["password"];
						$_SESSION["perfil"] = $answer["profile"];

					
						echo '<script>

							window.location = "inicio";

						</script>';



					}else{


						echo '<br>

						<div class="alert alert-warning">Este usuario aun no está activado</div>



						';


					}
					


				}else{


					echo '<br>

					<div class="alert alert-danger">Error al ingresar, el usuario y/o clave no coincide. Vuelva a intentarlo</div>	
					';

						
				}

				


				


			}
			
			



		}



	}
	
	/*=============================================
	=         MOSTRAR  ADMINISTRADORES      =
	=============================================*/

	static public function ctrViewAdministrators($item, $value){

		$table ="administrators";
		
		$answer = ModelUser::mdlViewAdministrators($table, $item, $value);

		return $answer;


	}
	/*=============================================
	=        CREAR UN PERFIL     =
	=============================================*/
	static public function ctrCreateProfile(){

		if(isset($_POST["newProfile"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newName"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["newpassword"])){
				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = "";

				if(isset($_FILES["newPhoto"]["tmp_name"]) && !empty($_FILES["newPhoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["newPhoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["newPhoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "views/img/perfiles/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["newPhoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["newPhoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "views/img/perfiles/".$aleatorio.".png";

						$origin = imagecreatefrompng($_FILES["newPhoto"]["tmp_name"]);

						$destiny = imagecreatetruecolor($new_Width, $new_height);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

						imagepng($destiny, $ruta);

					}

				}



				$table = "administrators";

				$encriptar = crypt($_POST["newpassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datos = array("name" => $_POST["newName"],
								"email" => $_POST["newEmail"],
								"password" => $encriptar,
								"profile" => $_POST["newProfile"],			       
								"photo"=>$ruta,
								"state" => 1);

				$respuesta = ModelUser::mdlInsertProfile($table, $datos);
				
				if($respuesta == "ok"){

					echo '<script>

						Swal.fire({
							title: "Guardado!",
							text: "El usuario se a creado correctamente!",
							icon: "success",
							confirmButtonText: "¡Cerrar!"
						}).then(function(result){
							
							if (result.value) {
			
								window.location = window.location.href;
				
							}
						})
				

					</script>';


				}	







			}else{

				echo '<script>

					Swal.fire({

						icon: "error",
						title: "¡El perfil no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = window.location.href;

						}

					});
				

				</script>';

			}



		}





	}


	/*=============================================
	=        ACTUALIZAR UN PERFIL     =
	=============================================*/
			
	static public function ctrEditProfile(){

		if(isset($_POST["idPerfil"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editName"])){

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = $_POST["fotoActual"];

				if(isset($_FILES["editPhoto"]["tmp_name"]) && !empty($_FILES["editPhoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editPhoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["fotoActual"])){

						unlink($_POST["fotoActual"]);

					}

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editPhoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "views/img/perfiles/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editPhoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["editPhoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "views/img/perfiles/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editPhoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

					$_SESSION["foto"]= $ruta;

				}

				$table = "administrators";

				if($_POST["editPassword"] != ""){

					if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editPassword"])){

						$encriptar = crypt($_POST["editPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					}else{

						echo'<script>

							Swal.fire({

								title: "¡la contraseña no puede  llevar caracteres especiales!",
								icon: "error",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"
		
							}).then(function(result){
		
								if(result.value){
								
									window.location = window.location.href;
		
								}
		
							});


							</script>';

					}

				}else{

					$encriptar = $_POST["passwordActual"];

				}

				$datos = array("id" => $_POST["idPerfil"],
								"name" => $_POST["editName"],
								"email" => $_POST["editEmail"],
								"password" => $encriptar,
								"profile" => $_POST["editProfile"],
								"photo" => $ruta);

			


				$answer = ModelUser::mdlEditProfile($table, $datos);

				if($answer == "ok"){

					echo'<script>

					
					
						Swal.fire({
							title: "Actualizado!",
							text: "El usuario se a actualizado correctamente!",
							icon: "success",
							confirmButtonText: "¡Cerrar!"
						}).then(function(result){
							
							if (result.value) {
			
								window.location = window.location.href;
				
							}
						})
				

					</script>';

				}


			}else{

				echo'<script>

						
					Swal.fire({

						icon: "error",
						title: "¡El perfil no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = window.location.href;
				

						}

					});
		

					
				</script>';

			}

		}

	}

	/*=============================================
	ELIMINAR PERFIL
	=============================================*/

	static public function ctrDeletePerfil(){

		if(isset($_GET["idPerfil"])){

			$table ="administrators";
			$datos = $_GET["idPerfil"];

			if($_GET["fotoPerfil"] != ""){

				unlink($_GET["fotoPerfil"]);
			
			}

			$respuesta = ModelUser::mdlDeleteProfile($table, $datos);

			if($respuesta == "ok"){

				echo'<script>

				Swal.fire({

					  icon: "success",
					  title: "El perfil ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  
					  }).then(function(result) {
								if (result.value) {

									let url = window.location.href;
									let pos = url.indexOf("&idPerfil");									
									url2= url.substring(0, pos);									
									window.location = url2;

								}
							})

				</script>';

			}		

		}

	}


	/*=============================================
	=           Olvido de contraseña           =
	=============================================*/

	public function ctrForgetPassword(){

		if(isset($_POST["passEmail"])){

			if( preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["passEmail"]) ){


				/*=============================================
				GENERAR CONTRASEÑA ALEATORIA
				=============================================*/
				

				function generarPassword($longitud){

					$key = "";
					$pattern = "1234567890abcdefghijklmnopqrstuvwxyz";

					$max = strlen($pattern)-1;

					for($i = 0; $i < $longitud; $i++){

						$key .= $pattern{mt_rand(0,$max)};

					}

					return $key;

				}

				$nuevaPassword = generarPassword(11);

				//var_dump($nuevaPassword);	



				$encriptar = crypt($nuevaPassword, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$table="administrators";

				$item1="email";
				$value1= $_POST["passEmail"];

				$answer1 = ModelUser::mdlViewAdministrators($table,$item1,$value1 );

				


				if($answer1){

					$id= $answer1["id"];
					$item="password";
					$value = $encriptar;



					$answer = ModelUser::mdlUpdateItemUser($table,$id, $item, $value );
					
					if($answer  == "ok"){

						$table2 = "commerce";

						$commerce = ModelCommerce::mdlSelectCommerce($table2);

						
						/*=============================================
						CAMBIO DE CONTRASEÑA
						=============================================*/

						date_default_timezone_set("America/Caracas");

						$url = ModelRoute::mdlRouteServer();
						
						

						$mail = new PHPMailer(true);
						

						
						$mail->CharSet = 'UTF-8';

						$mail->isMail();

						$mail->setFrom($commerce["email_contact"], $commerce["name"]);

						$mail->addReplyTo($commerce["email_contact"], $commerce["name"]);

						$mail->Subject = "Solicitud de nueva contraseña";

						$mail->addAddress($_POST["passEmail"]);

						$mail->msgHTML('<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">
	
								<center>
									
									<img style="padding:20px; width:10%" src="http://tutorialesatualcance.com/tienda/logo.png">

								</center>

								<div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
								
									<center>
									
									<img style="padding:20px; width:15%" src="https://icon-icons.com/es/icono/en-la-nube-seguridad/87933">

									<h3 style="font-weight:100; color:#999">SOLICITUD DE NUEVA CONTRASEÑA</h3>

									<hr style="border:1px solid #ccc; width:80%">

									<h4 style="font-weight:100; color:#999; padding:0 20px"><strong>Su nueva contraseña: </strong>'.$nuevaPassword.'</h4>

									<a href="'.$url.'" target="_blank" style="text-decoration:none">

									<div style="line-height:60px; background:#0aa; width:60%; color:white">Ingrese nuevamente al sitio</div>

									</a>

									<br>

									<hr style="border:1px solid #ccc; width:80%">

									<h5 style="font-weight:100; color:#999">Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará.</h5>

									</center>

								</div>

							</div>');

						$envio = $mail->Send();

						if(!$envio){

							echo '<script> 

								Swal.fire({
									  title: "¡ERROR!",
									  text: "¡Ha ocurrido un problema enviando cambio de contraseña a '.$_POST["passEmail"].$mail->ErrorInfo.'!",
									  icon:"error",
									  confirmButtonText: "Cerrar"
								}).then(function(result){
							
									if (result.value) {
										
										window.location = window.location.href;
						
									}
								});

							</script>';

						}else{

							echo '<script> 

									Swal.fire({
									  title: "¡OK!",
									  text: "¡Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electrónico '.$_POST["passEmail"].' para su cambio de contraseña!",
									  icon:"success",
									  confirmButtonText: "Cerrar"
									}).then(function(result){
							
										if (result.value) {
											let url = window.location.href;
											let pos = url.indexOf("forgot-password");
											let sln = url.length;
											url2= url.substring(0, pos);
											console.log(url2);
											window.location = url2;
							
										}
									});

							</script>';

						}

					}



				}else{

					echo '<script> 

							Swal.fire({
							  title: "¡ERROR!",
							  text: "¡Error el correo electronico, no está registrado!",
							  icon:"error",
							  confirmButtonText: "Cerrar"
							}).then(function(result){
							
								if (result.value) {
				
									window.location = window.location.href;
					
								}
							});

				</script>';



				}






			}else{

				echo '<script> 

							Swal.fire({
							  title: "¡ERROR!",
							  text: "¡Error el correo electronico, está mal escrito!",
							  icon:"error",
							  confirmButtonText: "Cerrar"
							}).then(function(result){
							
								if (result.value) {
				
									window.location = window.location.href;
					
								}
							});

				</script>';


			   


			}


		}



	}
	
	
}