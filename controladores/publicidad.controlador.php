<?php

class ControladorPublicidad{


	/*=====================================================
	=            Mostrar Registro de Publicidad             =
	=====================================================*/
	static public function ctrMostrarPublicidad($item, $valor){

		$tabla = "publicidad";

		$respuesta = ModeloPublicidad::mdlMostrarPublicidad($tabla, $item, $valor);

		return $respuesta;

	}
	/*=====  End of Mostrar Registro de Publicidad   ======*/


		/*==========================================
	=            Registro de Publicidad      =
	==========================================*/
	
	public function ctrRegistroPublicidad(){

		if(isset($_POST["selecCategoriaPulicidad"]) && isset($_POST["disposicionPublicidad"])){
			
			 if(preg_match('/^[\/\=\\;\\?\\¿\\&\\#\\!\\_\\¡\\:\\,\\.\\$\\-\\ a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["urlPublicidad"]) && $_POST["selecCategoriaPulicidad"] != null && $_POST["disposicionPublicidad"] != null ){

				if(isset($_FILES["subirPublicidad"]["tmp_name"]) && !empty($_FILES["subirPublicidad"]["tmp_name"])){


					$tamano_archivo = $_FILES['subirPublicidad']['size'];

					/*=====================================================
					=            DEFINIENDO RUTA DE LA CARPETA            =
					=====================================================*/

		
					if($_POST["selecCategoriaPulicidad"] == "mundo animal"){
						
						$carpeta = "animal";

					}else{

						if($_POST["selecCategoriaPulicidad"] == "espacio musical"){

							$carpeta = "musica";
						
						}else{

							if($_POST["selecCategoriaPulicidad"] == "espacio verde"){

								$carpeta = "verde";
								
							}else{

								if($_POST["selecCategoriaPulicidad"] == "espacio infantil"){

									$carpeta = "infantil";

								}else{
                                       
                                   $carpeta = $_POST["selecCategoriaPulicidad"];    


								}
							}

						}
					}
										
					/*=====  End of DEFINIENDO RUTA DE LA CARPETA  ======*/
					

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PLAN
					=============================================*/

					$directorio = "vistas/img/publicidad/".$carpeta."";

					/*=================================================================
					=            Tipo de publicidad Vertical o Horizaontal            =
					=================================================================*/
				
						
				    $tipoPublicidad = $_POST["disposicionPublicidad"];


					/*=====  End of Tipo de publicidad Vertical o Horizaontal  ======*/


					
					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["subirPublicidad"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(10000,99999);

						$ruta = $directorio."/".$tipoPublicidad."_".$aleatorio.".jpg";//ruta en donde voy a guardar el archivo

						$origen = imagecreatefromjpeg($_FILES["subirPublicidad"]["tmp_name"]);//guardo temporal mente mi archivo de donde este para trabajarlo


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

					} else

					/*===================================
					=            Archivo GIF            =
					===================================*/

					if($_FILES["subirPublicidad"]["type"] == "image/gif"){

						$aleatorio = mt_rand(10000,99999);

						$ruta = $directorio."/".$tipoPublicidad."_".$aleatorio.".gif";//ruta en donde voy a guardar el archivo

						$origen = $_FILES["subirPublicidad"]["tmp_name"];//guardo temporal mente mi archivo de donde este para trabajarlo
                        
                       //   imagegif($origen, $ruta); //no sirve
                       
                        move_uploaded_file($origen, $ruta);
                        
                        imagedestroy($origen);



					}
					/*=====  End of Archivo GIF  ======*/
					else 

						if($_FILES["subirPublicidad"]["type"] == "image/png"){

						$quality = 9; // calidad del png

						$aleatorio = mt_rand(10000,99999);

						$ruta = $directorio."/".$tipoPublicidad."_".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["subirPublicidad"]["tmp_name"]);						

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

					$tabla = "publicidad";
					
					$datos = array("id_categoria_publi" => $_POST["selecCategoriaPulicidad"],
						           "disposicion" => $_POST["disposicionPublicidad"],
						           "ruta_img_publicidad" => $ruta,
								   "url_publicidad" => $_POST["urlPublicidad"]);

					$respuesta = ModeloPublicidad::mdlRegistroPublicidad($tabla, $datos);

					if($respuesta == "ok"){

						echo '<script>

							swal.fire({
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "¡La Publicidad se ha subido exitosamente!",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
							}).then(function(result){

									if(result.value){

									   window.location = "publicidad";  
									 /*	history.back();*/ 
									
									  } 
							});

						</script>';

					}	

				}

			}else{

			 	echo '<script>

					swal.fire({

						type:"error",
						title: "¡CORREGIR!",
						text: "¡No se permiten ciertos caracteres, solo(\= \; \? \“\ ”\ ¿\ !\ ¡\ :\ ,\ .\ $\ -\ ), Revisar si ha seleccionado una seccion o disposicion!",
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

	/*=====  End of Registro Publicidad ======*/



		/*==========================================
	=            Editar Publicidad      =
	==========================================*/
	
	public function ctrEditarPublicidad(){

		if(isset($_POST["idPublicidad"])){
			
			 if(preg_match('/^[\/\=\\;\\?\\¿\\&\\!\\_\\#\\¡\\:\\,\\.\\$\\-\\ a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarUrlPublicidad"]) && $_POST["editarSelecCategoriaPulicidad"] != null && $_POST["editarDisposicionPublicidad"] != null ){

			 	$ruta = $_POST["subirPublicidadActual"];

				if(isset($_FILES["editarSubirPublicidad"]["tmp_name"]) && !empty($_FILES["editarSubirPublicidad"]["tmp_name"])){


					$tamano_archivo = $_FILES['editarSubirPublicidad']['size'];

					/*=====================================================
					=            DEFINIENDO RUTA DE LA CARPETA            =
					=====================================================*/

		
					if($_POST["editarSelecCategoriaPulicidad"] == "mundo animal"){
						
						$carpeta = "animal";

					}else{

						if($_POST["editarSelecCategoriaPulicidad"] == "espacio musical"){

							$carpeta = "musica";
						
						}else{

							if($_POST["editarSelecCategoriaPulicidad"] == "espacio verde"){

								$carpeta = "verde";
								
							}else{

								if($_POST["editarSelecCategoriaPulicidad"] == "espacio infantil"){

									$carpeta = "infantil";

								}else{
                                       
                                   $carpeta = $_POST["editarSelecCategoriaPulicidad"];    


								}
							}

						}
					}
										
					/*=====  End of DEFINIENDO RUTA DE LA CARPETA  ======*/
					

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PLAN
					=============================================*/

					$directorio = "vistas/img/publicidad/".$carpeta."";

					/*=================================================================
					=            Tipo de publicidad Vertical o Horizaontal            =
					=================================================================*/
				
						
				    $tipoPublicidad = $_POST["editarDisposicionPublicidad"];


					/*=====  End of Tipo de publicidad Vertical o Horizaontal  ======*/


					if(isset($_POST["subirPublicidadActual"])){

						unlink($_POST["subirPublicidadActual"]); //Eliminando imagen antigua de la carpeta  
					}


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarSubirPublicidad"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(10000,99999);

						$ruta = $directorio."/".$tipoPublicidad."_".$aleatorio.".jpg";//ruta en donde voy a guardar el archivo

						$origen = imagecreatefromjpeg($_FILES["editarSubirPublicidad"]["tmp_name"]);//guardo temporal mente mi archivo de donde este para trabajarlo


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

					} else

					/*===================================
					=            Archivo GIF            =
					===================================*/

					if($_FILES["editarSubirPublicidad"]["type"] == "image/gif"){

						$aleatorio = mt_rand(10000,99999);

						$ruta = $directorio."/".$tipoPublicidad."_".$aleatorio.".gif";//ruta en donde voy a guardar el archivo

						$origen = $_FILES["editarSubirPublicidad"]["tmp_name"];//guardo temporal mente mi archivo de donde este para trabajarlo
                        
                       //   imagegif($origen, $ruta); //no sirve
                       
                        move_uploaded_file($origen, $ruta);
                        
                        imagedestroy($origen);



					}
					/*=====  End of Archivo GIF  ======*/
					else 

						if($_FILES["editarSubirPublicidad"]["type"] == "image/png"){

						$quality = 9; // calidad del png

						$aleatorio = mt_rand(10000,99999);

						$ruta = $directorio."/".$tipoPublicidad."_".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarSubirPublicidad"]["tmp_name"]);						

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
			

					$tabla = "publicidad";
					
					$datos = array("id_publicidad" => $_POST["idPublicidad"],
						           "id_categoria_publi" => $_POST["editarSelecCategoriaPulicidad"],
						           "disposicion" => $_POST["editarDisposicionPublicidad"],
						           "ruta_img_publicidad" => $ruta,
								   "url_publicidad" => $_POST["editarUrlPublicidad"]);

					$respuesta = ModeloPublicidad::mdlEditarPublicidad($tabla, $datos);

					if($respuesta == "ok"){

						echo '<script>

							swal.fire({
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "¡La Publicidad se actualizo correctamente!",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
							}).then(function(result){

									if(result.value){

									   window.location = "publicidad"; 
									/* 	history.back(); */  
									
									  } 
							});

						</script>';

					}	

				

			}else{

			 	echo '<script>

					swal.fire({

						type:"error",
						title: "¡CORREGIR!",
						text: "¡No se permiten ciertos caracteres, solo(\= \; \? \“\ ”\ ¿\ !\ ¡\ :\ ,\ .\ $\ -\ ), Revisar si ha seleccionado una seccion o disposicion!",
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

	/*=====  End of Editar Publicidad ======*/




	/*=============================================
	Eliminar Publicidad
	=============================================*/

	static public function ctrEliminarPublicidad($id, $ruta){
		
		unlink("../".$ruta);//borro la ruta de la imagen es decir borro el archivo de la carpeta

		$tabla = "publicidad";

		$respuesta = ModeloPublicidad::mdlEliminarPublicidad($tabla, $id);

		return $respuesta;

	}


}