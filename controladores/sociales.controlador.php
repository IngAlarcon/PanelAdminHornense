<?php

class ControladorSociales{


	/*=====================================================
	=            Mostrar Registro de Sociales             =
	=====================================================*/
	static public function ctrMostrarSociales($item, $valor){

		$tabla = "sociales";

		$respuesta = ModeloSociales::mdlMostrarSociales($tabla, $item, $valor);

		return $respuesta;

	}
	/*=====  End of Mostrar Registro de Sociales   ======*/

	/*==========================================
	=            Registro de Social            =
	==========================================*/
	
	public function ctrRegistroSocial(){

		if(isset($_POST["tituloSocial"])){

			if(preg_match('/^[\/\=\\;\\?\\“\\”\\¿\\!\\¡\\:\\,\\.\\$\\-\\ a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["tituloSocial"]) &&
			   preg_match('/^[\/\=\\;\\?\\“\\”\\¿\\!\\¡\\:\\,\\.\\$\\-\\ a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["epigrafeImgSocial"]) && 
			   preg_match('/^[\/\\,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["descripcionImgSocial"]) && 
			   preg_match('/^[\/\=\\&\\;\\_\\*\\"\\“\\”\\<\\>\\?\\@\\¿\\!\\…\\¡\\:\\,\\.\\$\\|\\-\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["contenidoSocial"])){

				if(isset($_FILES["subirImgSocial"]["tmp_name"]) && !empty($_FILES["subirImgSocial"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["subirImgSocial"]["tmp_name"]);

					$tamanio = getimagesize($_FILES["subirImgSocial"]["tmp_name"]);

					$tamano_archivo = $_FILES['subirImgSocial']['size'];

					// $nuevoAncho = $ancho;
					// $nuevoAlto = $alto;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PLAN
					=============================================*/

					$directorio = "vistas/img/sociales";


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["subirImgSocial"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(10000,99999);

						$ruta = $directorio."/social_".$aleatorio.".jpg";//ruta en donde voy a guardar el archivo

						$origen = imagecreatefromjpeg($_FILES["subirImgSocial"]["tmp_name"]);//guardo temporal mente mi archivo de donde este para trabajarlo


						if ($tamano_archivo < 1000000) {

							imagejpeg($origen, $ruta, 80);

						}else{

							if ($tamano_archivo < 3000000) {

								imagejpeg($origen, $ruta, 70);

							}else{

								if ($tamano_archivo < 5000000) {

									imagejpeg($origen, $ruta, 60);

								}else{

									if ($tamano_archivo < 7000000) {

										imagejpeg($origen, $ruta, 40);

									}else{

										if ($tamano_archivo < 10000000) {

											imagejpeg($origen, $ruta, 25);

										}else{

											imagejpeg($origen, $ruta, 20);

										}
									}

								}

							}
						}

						imagedestroy($origen);


					}

					else 

						if($_FILES["subirImgSocial"]["type"] == "image/png"){

						$quality = 9; // calidad del png

						$aleatorio = mt_rand(10000,99999);

						$ruta = $directorio."/social".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["subirImgSocial"]["tmp_name"]);						


						if ($tamanio < 1000000 ) {

						
							imagepng($origen, $ruta);

						}else{

						
						    imagepng($origen, $ruta, $quality);

						 }

					}else{

						echo'<script>

							swal.fire({
									type:"error",
								  	title: "¡CORREGIR!",
								  	text: "¡No se permiten formatos diferentes a JPG y/o PNG!",
								  	showConfirmButton: true,
									confirmButtonText: "Cerrar"
								  
							}).then(function(result){

									if(result.value){   
									    history.back();
									  } 
							});

						</script>';

						return;

					}
				}

              /*SEGUNDA IMAGEN*/
                $epigrafeDos = null;
	            $descripcionDos = null;
	            $ruta2 = null;              

				if(isset($_FILES["subirImgSocialdos"]["tmp_name"]) && !empty($_FILES["subirImgSocialdos"]["tmp_name"])){


					   if ($_POST["epigrafeImgSocialdos"] != null &&  $_POST["descripcionImgSocialdos"] != null && 
					   	   preg_match('/^[\/\=\\;\\?\\“\\”\\¿\\!\\¡\\:\\,\\.\\$\\-\\ a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["epigrafeImgSocialdos"]) && 
			               preg_match('/^[\/\\,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["descripcionImgSocialdos"])){

	                		$epigrafeDos = $_POST["epigrafeImgSocialdos"];
	                	    $descripcionDos = $_POST["descripcionImgSocialdos"];

	                	}else{

	                		echo'<script>

								swal.fire({
										type:"error",
									  	title: "¡CORREGIR!",
									  	text: "¡En la imagen dos no se completo algun campo o el contenido contiene caracteres no permitidos!",
									  	showConfirmButton: true,
										confirmButtonText: "Cerrar"
									  
								}).then(function(result){

										if(result.value){   
										    history.back();
										  } 
								});

							</script>';

							return;
	                   }



					$tamano_archivo = $_FILES['subirImgSocialdos']['size'];

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PLAN
					=============================================*/

					$directorio = "vistas/img/sociales";		

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["subirImgSocialdos"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(10000,99999);

						$ruta2 = $directorio."/social_".$aleatorio.".jpg";//ruta en donde voy a guardar el archivo

						$origen = imagecreatefromjpeg($_FILES["subirImgSocialdos"]["tmp_name"]);//guardo temporal mente mi archivo de donde este para trabajarlo


						if ($tamano_archivo < 1000000) {

							imagejpeg($origen, $ruta2, 80);

						}else{

							if ($tamano_archivo < 3000000) {

								imagejpeg($origen, $ruta2, 70);

							}else{

								if ($tamano_archivo < 5000000) {

									imagejpeg($origen, $ruta2, 60);

								}else{

									if ($tamano_archivo < 7000000) {

										imagejpeg($origen, $ruta2, 40);

									}else{

										if ($tamano_archivo < 10000000) {

											imagejpeg($origen, $ruta2, 25);

										}else{

											imagejpeg($origen, $ruta2, 20);

										}
									}

								}

							}
						}

						imagedestroy($origen);


					}

					else 

						if($_FILES["subirImgSocialdos"]["type"] == "image/png"){

						$quality = 9; // calidad del png

						$aleatorio = mt_rand(10000,99999);

						$ruta2 = $directorio."/social".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["subirImgSocialdos"]["tmp_name"]);						


						if ($tamanio < 1000000 ) {

						
							imagepng($origen, $ruta2);

						}else{

						
						    imagepng($origen, $ruta2, $quality);

						 }

					}else{

						echo'<script>

							swal.fire({
									type:"error",
								  	title: "¡CORREGIR!",
								  	text: "¡No se permiten formatos diferentes a JPG y/o PNG!",
								  	showConfirmButton: true,
									confirmButtonText: "Cerrar"
								  
							}).then(function(result){

									if(result.value){   
									    history.back();
									  } 
							});

						</script>';

						return;
                      }
					}

              /*Tercera imagen*/

                $epigrafeTres = null;
	            $descripcionTres = null;
	            $ruta3 = null;  

				if(isset($_FILES["subirImgSocialtres"]["tmp_name"]) && !empty($_FILES["subirImgSocialtres"]["tmp_name"])){


					 if ($_POST["epigrafeImgSocialtres"] != null &&  $_POST["descripcionImgSocialtres"] != null && 
					   	   preg_match('/^[\/\=\\;\\?\\“\\”\\¿\\!\\¡\\:\\,\\.\\$\\-\\ a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["epigrafeImgSocialtres"]) && 
			               preg_match('/^[\/\\,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["descripcionImgSocialtres"])){

	                		$epigrafeTres = $_POST["epigrafeImgSocialtres"];
	                	    $descripcionTres = $_POST["descripcionImgSocialtres"];

	                	}else{

	                		echo'<script>

								swal.fire({
										type:"error",
									  	title: "¡CORREGIR!",
									  	text: "¡En la imagen tres no se completo algun campo o el contenido contiene caracteres no permitidos!",
									  	showConfirmButton: true,
										confirmButtonText: "Cerrar"
									  
								}).then(function(result){

										if(result.value){   
										    history.back();
										  } 
								});

							</script>';

							return;
	                   }


					$tamano_archivo = $_FILES['subirImgSocialtres']['size'];

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PLAN
					=============================================*/

					$directorio = "vistas/img/sociales";		

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["subirImgSocialtres"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(10000,99999);

						$ruta3 = $directorio."/social_".$aleatorio.".jpg";//ruta en donde voy a guardar el archivo

						$origen = imagecreatefromjpeg($_FILES["subirImgSocialtres"]["tmp_name"]);//guardo temporal mente mi archivo de donde este para trabajarlo


						if ($tamano_archivo < 1000000) {

							imagejpeg($origen, $ruta3, 80);

						}else{

							if ($tamano_archivo < 3000000) {

								imagejpeg($origen, $ruta3, 70);

							}else{

								if ($tamano_archivo < 5000000) {

									imagejpeg($origen, $ruta3, 60);

								}else{

									if ($tamano_archivo < 7000000) {

										imagejpeg($origen, $ruta3, 40);

									}else{

										if ($tamano_archivo < 10000000) {

											imagejpeg($origen, $ruta3, 25);

										}else{

											imagejpeg($origen, $ruta3, 20);

										}
									}

								}

							}
						}

						imagedestroy($origen);


					}

					else 

						if($_FILES["subirImgSocialtres"]["type"] == "image/png"){

						$quality = 9; // calidad del png

						$aleatorio = mt_rand(10000,99999);

						$ruta3 = $directorio."/social".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["subirImgSocialtres"]["tmp_name"]);						


						if ($tamanio < 1000000 ) {

						
							imagepng($origen, $ruta3);

						}else{

						
						    imagepng($origen, $ruta3, $quality);

						 }

					}else{

						echo'<script>

							swal.fire({
									type:"error",
								  	title: "¡CORREGIR!",
								  	text: "¡No se permiten formatos diferentes a JPG y/o PNG!",
								  	showConfirmButton: true,
									confirmButtonText: "Cerrar"
								  
							}).then(function(result){

									if(result.value){   
									    history.back();
									  } 
							});

						</script>';

						return;
                      }
					}

              /*CUARTA IMAGEN*/

              	$epigrafeCuatro = null;
	            $descripcionCuatro = null;
	            $ruta4 = null;  

				if(isset($_FILES["subirImgSocialcuatro"]["tmp_name"]) && !empty($_FILES["subirImgSocialcuatro"]["tmp_name"])){


			       if ($_POST["epigrafeImgSocialcuatro"] != null &&  $_POST["descripcionImgSocialcuatro"] != null && 
					   	   preg_match('/^[\/\=\\;\\?\\“\\”\\¿\\!\\¡\\:\\,\\.\\$\\-\\ a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["epigrafeImgSocialcuatro"]) && 
			               preg_match('/^[\/\\,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["descripcionImgSocialcuatro"])){

	                		$epigrafeCuatro = $_POST["epigrafeImgSocialcuatro"];
	                	    $descripcionCuatro = $_POST["descripcionImgSocialcuatro"];

	                	}else{

	                		echo'<script>

								swal.fire({
										type:"error",
									  	title: "¡CORREGIR!",
									  	text: "¡En la cuarta imagen no se completo algun campo o el contenido contiene caracteres no permitidos!",
									  	showConfirmButton: true,
										confirmButtonText: "Cerrar"
									  
								}).then(function(result){

										if(result.value){   
										    history.back();
										  } 
								});

							</script>';

							return;
	                   }

					$tamano_archivo = $_FILES['subirImgSocialcuatro']['size'];

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PLAN
					=============================================*/

					$directorio = "vistas/img/sociales";		

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["subirImgSocialcuatro"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(10000,99999);

						$ruta4 = $directorio."/social_".$aleatorio.".jpg";//ruta en donde voy a guardar el archivo

						$origen = imagecreatefromjpeg($_FILES["subirImgSocialcuatro"]["tmp_name"]);//guardo temporal mente mi archivo de donde este para trabajarlo


						if ($tamano_archivo < 1000000) {

							imagejpeg($origen, $ruta4, 80);

						}else{

							if ($tamano_archivo < 3000000) {

								imagejpeg($origen, $ruta4, 70);

							}else{

								if ($tamano_archivo < 5000000) {

									imagejpeg($origen, $ruta4, 60);

								}else{

									if ($tamano_archivo < 7000000) {

										imagejpeg($origen, $ruta4, 40);

									}else{

										if ($tamano_archivo < 10000000) {

											imagejpeg($origen, $ruta4, 25);

										}else{

											imagejpeg($origen, $ruta4, 20);

										}
									}

								}

							}
						}

						imagedestroy($origen);


					}

					else 

						if($_FILES["subirImgSocialcuatro"]["type"] == "image/png"){

						$quality = 9; // calidad del png

						$aleatorio = mt_rand(10000,99999);

						$ruta4 = $directorio."/social".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["subirImgSocialcuatro"]["tmp_name"]);						


						if ($tamanio < 1000000 ) {

						
							imagepng($origen, $ruta4);

						}else{

						
						    imagepng($origen, $ruta4, $quality);

						 }

					}else{

						echo'<script>

							swal.fire({
									type:"error",
								  	title: "¡CORREGIR!",
								  	text: "¡No se permiten formatos diferentes a JPG y/o PNG!",
								  	showConfirmButton: true,
									confirmButtonText: "Cerrar"
								  
							}).then(function(result){

									if(result.value){   
									    history.back();
									  } 
							});

						</script>';

						return;
                      }
					}


					$tabla = "sociales";

					$datos = array("titulo_social" => $_POST["tituloSocial"],
								   "imagen_social_ruta" => $ruta,
								   "epigrafe_social_uno" => $_POST["epigrafeImgSocial"],
								   "descripcion_img_social" => $_POST["descripcionImgSocial"],
								   "imagen_social_rutados" => $ruta2,
								   "epigrafe_social_dos" => $epigrafeDos,
								   "descripcion_img_social_dos" => $descripcionDos,
								   "imagen_social_rutatres" => $ruta3,
								   "epigrafe_social_tres" => $epigrafeTres,
								   "descripcion_img_social_tres" => $descripcionTres,
								   "imagen_social_rutacuatro" => $ruta4,
								   "epigrafe_social_cuatro" => $epigrafeCuatro,
								   "descripcion_img_social_cuatro" => $descripcionCuatro,								   
								   "contenido_social" => $_POST["contenidoSocial"]);

					$respuesta = ModeloSociales::mdlRegistroSocial($tabla, $datos);

					if($respuesta == "ok"){

						echo '<script>

							swal.fire({
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "¡La Nota Social se ha creado exitosamente!",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
							}).then(function(result){

									if(result.value){

									    window.location = "sociales";   
										/*history.back();*/
									
									  } 
							});

						</script>';

					}	

				

			}else{

			 	echo '<script>

					swal.fire({

						type:"error",
						title: "¡CORREGIR!",
						text: "¡No se permiten ciertos caracteres, En titulo solo (\= \; \? \“\ ”\ ¿\ !\ ¡\ :\ ,\ .\ $\ -\ ), En contenido solo (/ \= \ &\ ;\ _\ *\ “\ ”\ <\ >\ ?\ ¿\ !\ …\ ¡ \:\ ,\ .\ $\ |\ -)",
						
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){

						/*	window.location = "sociales";*/

							history.back();

						}

					});	

				</script>';

			}

		}

	}

	/*=====  End of Registro de Social  ======*/


	/*==========================================
	=        Edita registro de Social            =
	==========================================*/
	
	public function ctrEditarSocial(){


		if(isset($_POST["idSocial"])){

			if(preg_match('/^[\/\=\\;\\?\\“\\”\\¿\\!\\¡\\:\\,\\.\\$\\-\\ a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTituloSocial"]) &&
			   preg_match('/^[\/\=\\;\\?\\“\\”\\¿\\!\\¡\\:\\,\\.\\$\\-\\ a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEpigrafeImgSocial"]) &&  
			   preg_match('/^[\/\\,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcionImgSocial"]) &&
			   preg_match('/^[\/\=\\&\\;\\_\\*\\"\\“\\”\\<\\>\\?\\¿\\!\\…\\¡\\:\\,\\.\\$\\|\\-\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarContenidoSocial"])){

			   	$ruta = $_POST["imgSocialActual"];

				if(isset($_FILES["editarImgSocial"]["tmp_name"]) && !empty($_FILES["editarImgSocial"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarImgSocial"]["tmp_name"]);

					$tamanio = getimagesize($_FILES["editarImgSocial"]["tmp_name"]);

					$tamano_archivo = $_FILES['editarImgSocial']['size'];

					// $nuevoAncho = $ancho;
					// $nuevoAlto = $alto;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PLAN
					=============================================*/

					$directorio = "vistas/img/sociales";	

					/*==========================================================================
					=            PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA DB            =
					==========================================================================*/
					
					if(isset($_POST["imgSocialActual"])){

						unlink($_POST["imgSocialActual"]);
					}
					
					/*=====  End of PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA DB  ======*/
					
					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarImgSocial"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(10000,99999);

						$ruta = $directorio."/social".$aleatorio.".jpg";//ruta en donde voy a guardar el archivo

						$origen = imagecreatefromjpeg($_FILES["editarImgSocial"]["tmp_name"]);//guardo temporal mente mi archivo de donde este para trabajarlo

						if ($tamano_archivo < 1000000) {

							imagejpeg($origen, $ruta, 80);

						}else{

							if ($tamano_archivo < 3000000) {

								imagejpeg($origen, $ruta, 70);

							}else{

								if ($tamano_archivo < 5000000) {

									imagejpeg($origen, $ruta, 55);

								}else{

									if ($tamano_archivo < 7000000) {

										imagejpeg($origen, $ruta, 35);

									}else{

										if ($tamano_archivo < 10000000) {

											imagejpeg($origen, $ruta, 25);

										}else{

											imagejpeg($origen, $ruta, 20);

										}
									}

								}

							}
						}

						imagedestroy($origen);

					}

					else 

						if($_FILES["editarImgSocial"]["type"] == "image/png"){

						$quality = 9; // calidad del png

						$aleatorio = mt_rand(10000,99999);

						$ruta = $directorio."/social".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarImgSocial"]["tmp_name"]);						

						if ($tamanio < 1000000 ) {

						
							imagepng($origen, $ruta);

						}else{

						
						    imagepng($origen, $ruta, $quality);

						 }


					}else{

						echo'<script>

							swal.fire({
									type:"error",
								  	title: "¡CORREGIR!",
								  	text: "¡No se permiten formatos diferentes a JPG y/o PNG!",
								  	showConfirmButton: true,
									confirmButtonText: "Cerrar"
								  
							}).then(function(result){

									if(result.value){   
									    history.back();
									  } 
							});

						</script>';

						return;

					 }

					}

            /*=============================================
            =            Edicion imagen dos            =
            =============================================*/
            
			   	$ruta2 = $_POST["imgSocialActualdos"];

			   	$epigrafeDos = $_POST["editarEpigrafeImgSocialdos"];
                $descripcionDos = $_POST["editarDescripcionImgSocialdos"];



			   	if (empty($_POST["imgSocialActualdos"]["tmp_name"])  && $ruta2 == ""){

			   			$ruta2 = null;
			   			$epigrafeDos = null;
                        $descripcionDos = null;
			   	
			   	}

				if(isset($_FILES["editarImgSocialdos"]["tmp_name"]) && !empty($_FILES["editarImgSocialdos"]["tmp_name"])){

					$tamano_archivo = $_FILES['editarImgSocialdos']['size'];

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PLAN
					=============================================*/

					$directorio = "vistas/img/sociales";
				   	$epigrafeDos = $_POST["editarEpigrafeImgSocialdos"];
	                $descripcionDos = $_POST["editarDescripcionImgSocialdos"];						

					/*==========================================================================
					=            PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA DB            =
					==========================================================================*/
					
					if(isset($_POST["imgSocialActualdos"])){

						unlink($_POST["imgSocialActualdos"]);
					}
					
					/*=====  End of PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA DB  ======*/
					
					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarImgSocialdos"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(10000,99999);

						$ruta2 = $directorio."/social".$aleatorio.".jpg";//ruta en donde voy a guardar el archivo

						$origen = imagecreatefromjpeg($_FILES["editarImgSocialdos"]["tmp_name"]);//guardo temporal mente mi archivo de donde este para trabajarlo

						if ($tamano_archivo < 1000000) {

							imagejpeg($origen, $ruta2, 80);

						}else{

							if ($tamano_archivo < 3000000) {

								imagejpeg($origen, $ruta2, 70);

							}else{

								if ($tamano_archivo < 5000000) {

									imagejpeg($origen, $ruta2, 55);

								}else{

									if ($tamano_archivo < 7000000) {

										imagejpeg($origen, $ruta2, 35);

									}else{

										if ($tamano_archivo < 10000000) {

											imagejpeg($origen, $ruta2, 25);

										}else{

											imagejpeg($origen, $ruta2, 20);

										}
									}

								}

							}
						}

						imagedestroy($origen);

					}

					else 

						if($_FILES["editarImgSocialdos"]["type"] == "image/png"){

						$quality = 9; // calidad del png

						$aleatorio = mt_rand(10000,99999);

						$ruta2 = $directorio."/social".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarImgSocialdos"]["tmp_name"]);						

						if ($tamanio < 1000000 ) {

						
							imagepng($origen, $ruta2);

						}else{

						
						    imagepng($origen, $ruta2, $quality);

						 }


					}else{

						echo'<script>

							swal.fire({
									type:"error",
								  	title: "¡CORREGIR!",
								  	text: "¡No se permiten formatos diferentes a JPG y/o PNG!",
								  	showConfirmButton: true,
									confirmButtonText: "Cerrar"
								  
							}).then(function(result){

									if(result.value){   
									    history.back();
									  } 
							});

						</script>';

						return;

					 }

					}

            /*=============================================
            =            Edicion imagen Tres          =
            =============================================*/
            
			   	$ruta3 = $_POST["imgSocialActualtres"];

                $epigrafeTres = $_POST["editarEpigrafeImgSocialtres"];
                $descripcionTres = $_POST["editarDescripcionImgSocialtres"];

			 	if (empty($_POST["imgSocialActualtres"]["tmp_name"   && $ruta3== ""])){

			   			$ruta3 = null;
						$epigrafeTres = null;
						$descripcionTres = null;
			   	
			   	}

				if(isset($_FILES["editarImgSocialtres"]["tmp_name"]) && !empty($_FILES["editarImgSocialtres"]["tmp_name"])){

					$tamano_archivo = $_FILES['editarImgSocialtres']['size'];

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PLAN
					=============================================*/

					$directorio = "vistas/img/sociales";
	                $epigrafeTres = $_POST["editarEpigrafeImgSocialtres"];
	                $descripcionTres = $_POST["editarDescripcionImgSocialtres"];						

					/*==========================================================================
					=            PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA DB            =
					==========================================================================*/
					
					if(isset($_POST["imgSocialActualtres"])){

						unlink($_POST["imgSocialActualtres"]);
					}
					
					/*=====  End of PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA DB  ======*/
					
					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarImgSocialtres"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(10000,99999);

						$ruta3 = $directorio."/social".$aleatorio.".jpg";//ruta en donde voy a guardar el archivo

						$origen = imagecreatefromjpeg($_FILES["editarImgSocialtres"]["tmp_name"]);//guardo temporal mente mi archivo de donde este para trabajarlo

						if ($tamano_archivo < 1000000) {

							imagejpeg($origen, $ruta3, 80);

						}else{

							if ($tamano_archivo < 3000000) {

								imagejpeg($origen, $ruta3, 70);

							}else{

								if ($tamano_archivo < 5000000) {

									imagejpeg($origen, $ruta3, 55);

								}else{

									if ($tamano_archivo < 7000000) {

										imagejpeg($origen, $ruta3, 35);

									}else{

										if ($tamano_archivo < 10000000) {

											imagejpeg($origen, $ruta3, 25);

										}else{

											imagejpeg($origen, $ruta3, 20);

										}
									}

								}

							}
						}

						imagedestroy($origen);

					}

					else 

						if($_FILES["editarImgSocialtres"]["type"] == "image/png"){

						$quality = 9; // calidad del png

						$aleatorio = mt_rand(10000,99999);

						$ruta3 = $directorio."/social".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarImgSocialtres"]["tmp_name"]);						

						if ($tamanio < 1000000 ) {

						
							imagepng($origen, $ruta3);

						}else{

						
						    imagepng($origen, $ruta3, $quality);

						 }


					}else{

						echo'<script>

							swal.fire({
									type:"error",
								  	title: "¡CORREGIR!",
								  	text: "¡No se permiten formatos diferentes a JPG y/o PNG!",
								  	showConfirmButton: true,
									confirmButtonText: "Cerrar"
								  
							}).then(function(result){

									if(result.value){   
									    history.back();
									  } 
							});

						</script>';

						return;

					 }

					}

            /*=============================================
            =            Edicion imagen Cuatro          =
            =============================================*/
            
			   	$ruta4 = $_POST["imgSocialActualcuatro"];
	            $epigrafeCuatro = $_POST["editarEpigrafeImgSocialcuatro"];
                $descripcionCuatro = $_POST["editarDescripcionImgSocialcuatro"];

			   	if (empty($_POST["imgSocialActualcuatro"]["tmp_name"]) && $ruta4 == "" ){

			   			$ruta4 = null;
                        $epigrafeCuatro = null;
			   			$descripcionCuatro = null;
			   	
			   	}


				if(isset($_FILES["editarImgSocialcuatro"]["tmp_name"]) && !empty($_FILES["editarImgSocialcuatro"]["tmp_name"])){

					$tamano_archivo = $_FILES['editarImgSocialcuatro']['size'];

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PLAN
					=============================================*/

					$directorio = "vistas/img/sociales";
					$epigrafeCuatro = $_POST["editarEpigrafeImgSocialcuatro"];
                    $descripcionCuatro = $_POST["editarDescripcionImgSocialcuatro"];	

					/*==========================================================================
					=            PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA DB            =
					==========================================================================*/
					
					if(isset($_POST["imgSocialActualcuatro"])){

						unlink($_POST["imgSocialActualcuatro"]);
					}
					
					/*=====  End of PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA DB  ======*/
					
					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarImgSocialcuatro"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(10000,99999);

						$ruta4 = $directorio."/social".$aleatorio.".jpg";//ruta en donde voy a guardar el archivo

						$origen = imagecreatefromjpeg($_FILES["editarImgSocialcuatro"]["tmp_name"]);//guardo temporal mente mi archivo de donde este para trabajarlo

						if ($tamano_archivo < 1000000) {

							imagejpeg($origen, $ruta4, 80);

						}else{

							if ($tamano_archivo < 3000000) {

								imagejpeg($origen, $ruta4, 70);

							}else{

								if ($tamano_archivo < 5000000) {

									imagejpeg($origen, $ruta4, 55);

								}else{

									if ($tamano_archivo < 7000000) {

										imagejpeg($origen, $ruta4, 35);

									}else{

										if ($tamano_archivo < 10000000) {

											imagejpeg($origen, $ruta4, 25);

										}else{

											imagejpeg($origen, $ruta4, 20);

										}
									}

								}

							}
						}

						imagedestroy($origen);

					}

					else 

						if($_FILES["editarImgSocialcuatro"]["type"] == "image/png"){

						$quality = 9; // calidad del png

						$aleatorio = mt_rand(10000,99999);

						$ruta4 = $directorio."/social".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarImgSocialcuatro"]["tmp_name"]);						

						if ($tamanio < 1000000 ) {

						
							imagepng($origen, $ruta4);

						}else{

						
						    imagepng($origen, $ruta4, $quality);

						 }


					}else{

						echo'<script>

							swal.fire({
									type:"error",
								  	title: "¡CORREGIR!",
								  	text: "¡No se permiten formatos diferentes a JPG y/o PNG!",
								  	showConfirmButton: true,
									confirmButtonText: "Cerrar"
								  
							}).then(function(result){

									if(result.value){   
									    history.back();
									  } 
							});

						</script>';

						return;

					 }

					}

					$tabla = "sociales";

					$datos = array("id_social" => $_POST["idSocial"],
						           "titulo_social" => $_POST["editarTituloSocial"],
						           "epigrafe_social_uno" => $_POST["editarEpigrafeImgSocial"],
						           "descripcion_img_social" => $_POST["editarDescripcionImgSocial"],
								   "imagen_social_ruta" => $ruta,
								   "imagen_social_rutados" => $ruta2,
								   "epigrafe_social_dos" => $epigrafeDos,
								   "descripcion_img_social_dos" => $descripcionDos,
								   "imagen_social_rutatres" => $ruta3,
								   "epigrafe_social_tres" => $epigrafeTres,
								   "descripcion_img_social_tres" => $descripcionTres,
								   "imagen_social_rutacuatro" => $ruta4,
								   "epigrafe_social_cuatro" => $epigrafeCuatro,
								   "descripcion_img_social_cuatro" => $descripcionCuatro,								   								   
								   "contenido_social" => $_POST["editarContenidoSocial"]);

					$respuesta = ModeloSociales::mdlEditarSocial($tabla, $datos);

					if($respuesta == "ok"){

						echo '<script>

							swal.fire({
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "¡La Nota Social se ha actualizado!",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
							}).then(function(result){

									if(result.value){

									    window.location = "sociales";   
										/*history.back();*/
									
									  } 
							});

						</script>';

					}	
				

			}else{

			 	echo '<script>

					swal.fire({

						type:"error",
						title: "¡CORREGIR!",
						text: "¡No se permiten ciertos caracteres, En titulo solo (\= \; \? \“\ ”\ ¿\ !\ ¡\ :\ ,\ .\ $\ -\ ), En contenido solo (/ \= \ &\ ;\ _\ *\ “\ ”\ <\ >\ ?\ ¿\ !\ …\ ¡ \:\ ,\ .\ $\ |\ -)",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){

						/*	window.location = "sociales";*/

							history.back();

						}

					});	

				</script>';

			}

		}

	}

	
	/*=====  End of Registro de Social  ======*/

	/*=============================================
	Eliminar Social
	=============================================*/

	static public function ctrEliminarSocial($id, $ruta, $rutados, $rutatres, $rutacuatro){
		
		unlink("../".$ruta);//borro la ruta de la imagen es decir borro el archivo de la carpeta
		unlink("../".$rutados);
		unlink("../".$rutatres);
		unlink("../".$rutacuatro);

		$tabla = "sociales";

		$respuesta = ModeloSociales::mdlEliminarSocial($tabla, $id);

		return $respuesta;

	}
		

}