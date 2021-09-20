<?php

class ControladorGaleriaImagenes{


	/*=====================================================
	=            Mostrar Registro de Galeria Imagenes             =
	=====================================================*/
	static public function ctrMostrarGaleriaImagenes($item, $valor){

		$tabla = "galeria_imagen";

		$respuesta = ModeloGaleriaImagenes::mdlMostrarGaleriaImagenes($tabla, $item, $valor);

		return $respuesta;

	}
	/*=====  End of Mostrar Registro de Galeria Imagenes   ======*/


	/*==========================================
	=            Registro de Galeria Imagen        =
	==========================================*/
	
	public function ctrRegistroGaleriaImagen(){

		if(isset($_POST["selecCategoriaImg"])){
			
			 if(preg_match('/^[\/\=\\;\\?\\“\\”\\¿\\!\\¡\\:\\,\\.\\$\\-\\ a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["tituloImgGaleria"]) &&
			 	preg_match('/^[\/\=\\;\\?\\“\\”\\¿\\!\\¡\\:\\,\\.\\$\\-\\ a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["epigrafeImgGaleria"]) && 
			 	preg_match('/^[\/\\,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["descripcionImgGaleria"]) && $_POST["selecCategoriaImg"] != null){

				if(isset($_FILES["subirImgGaleria"]["tmp_name"]) && !empty($_FILES["subirImgGaleria"]["tmp_name"])){


					$tamano_archivo = $_FILES['subirImgGaleria']['size'];

					/*=====================================================
					=            DEFINIENDO RUTA DE LA CARPETA            =
					=====================================================*/

			    	
 
					if($_POST["selecCategoriaImg"] == "mundo animal"){
						
						$carpeta = "animal";

					}else{

						if($_POST["selecCategoriaImg"] == "espacio musical"){

							$carpeta = "musica";
						
						}else{

							if($_POST["selecCategoriaImg"] == "espacio verde"){

								$carpeta = "verde";
								
							}else{

								if($_POST["selecCategoriaImg"] == "espacio infantil"){

									$carpeta = "infantil";

								}else{
                                       
                                   $carpeta = $_POST["selecCategoriaImg"];    


								}
							}

						}
					}
										
					/*=====  End of DEFINIENDO RUTA DE LA CARPETA  ======*/

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PLAN
					=============================================*/

					$directorio = "vistas/img/galerias/imagenes/".$carpeta."";					
					
					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["subirImgGaleria"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(10000,99999);

						$ruta = $directorio."/".$carpeta."_".$aleatorio.".jpg";//ruta en donde voy a guardar el archivo

						$origen = imagecreatefromjpeg($_FILES["subirImgGaleria"]["tmp_name"]);//guardo temporal mente mi archivo de donde este para trabajarlo


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

						if($_FILES["subirImgGaleria"]["type"] == "image/png"){

						$quality = 9; // calidad del png

						$aleatorio = mt_rand(10000,99999);

						$ruta = $directorio."/".$carpeta."_".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["subirImgGaleria"]["tmp_name"]);						

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

					$tabla = "galeria_imagen";
					
					$datos = array("id_categoria_img" => $_POST["selecCategoriaImg"],
						           "titulo_imagen" => $_POST["tituloImgGaleria"],
						           "ruta_imagen" => $ruta,
								   "epigrafe_imagen" => $_POST["epigrafeImgGaleria"],
								   "descripcion_img_galeria" => $_POST["descripcionImgGaleria"]);

					$respuesta = ModeloGaleriaImagenes::mdlRegistroGaleriaImagen($tabla, $datos);

					if($respuesta == "ok"){

						echo '<script>

							swal.fire({
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "¡La Imagen se ha subido exitosamente a la galeria!",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
							}).then(function(result){

									if(result.value){

									   window.location = "galerias";  
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
						text: "¡No se permiten ciertos caracteres, En titulo se permiten (\= \; \? \“\ ”\ ¿\ !\ ¡\ :\ ,\ .\ $\ -\ ), En la descripcion ( ,\ .\ ) o Revisar si ha seleccionado una seccion!",
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

	/*=====  End of Registro de Imagen ======*/



	   /*==========================================
	=            Editar Imagen de Galeria         =
	==========================================*/
	
	public function ctrEditarGaleriaImagen(){

		if(isset($_POST["idImagen"])){
			
			 if(preg_match('/^[\/\=\\;\\?\\“\\”\\¿\\!\\¡\\:\\,\\.\\$\\-\\ a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTituloImgGaleria"]) &&
			 	preg_match('/^[\/\=\\;\\?\\“\\”\\¿\\!\\¡\\:\\,\\.\\$\\-\\ a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEpigrafeImgGaleria"]) && 
			 	preg_match('/^[\/\\,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcionImgGaleria"])){

			    $ruta = $_POST["subirImgGaleriaActual"];

				if(isset($_FILES["editarImgGaleria"]["tmp_name"]) && !empty($_FILES["editarImgGaleria"]["tmp_name"])){


					$tamano_archivo = $_FILES['editarImgGaleria']['size'];

					/*=====================================================
					=            DEFINIENDO RUTA DE LA CARPETA            =
					=====================================================*/

			  
					if($_POST["editarSelecCategoriaImg"] == "mundo animal"){
						
						$carpeta = "animal";

					}else{

						if($_POST["editarSelecCategoriaImg"] == "espacio musical"){

							$carpeta = "musica";
						
						}else{

							if($_POST["editarSelecCategoriaImg"] == "espacio verde"){

								$carpeta = "verde";
								
							}else{

								if($_POST["editarSelecCategoriaImg"] == "espacio infantil"){

									$carpeta = "infantil";

								}else{
                                       
                                   $carpeta = $_POST["editarSelecCategoriaImg"];    


								}
							}

						}
					}
										
					/*=====  End of DEFINIENDO RUTA DE LA CARPETA  ======*/

					if(isset($_POST["subirImgGaleriaActual"])){

						unlink($_POST["subirImgGaleriaActual"]); //Eliminando imagen antigua de la carpeta  
					}


					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PLAN
					=============================================*/

					$directorio = "vistas/img/galerias/imagenes/".$carpeta."";					
					
					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarImgGaleria"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(10000,99999);

						$ruta = $directorio."/".$carpeta."_".$aleatorio.".jpg";//ruta en donde voy a guardar el archivo

						$origen = imagecreatefromjpeg($_FILES["editarImgGaleria"]["tmp_name"]);//guardo temporal mente mi archivo de donde este para trabajarlo


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

						if($_FILES["editarImgGaleria"]["type"] == "image/png"){

						$quality = 9; // calidad del png

						$aleatorio = mt_rand(10000,99999);

						$ruta = $directorio."/".$carpeta."_".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarImgGaleria"]["tmp_name"]);						

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

					$tabla = "galeria_imagen";
					
					$datos = array("id_imagen" => $_POST["idImagen"],
						           "id_categoria_img" => $_POST["editarSelecCategoriaImg"],
						           "titulo_imagen" => $_POST["editarTituloImgGaleria"],
						           "ruta_imagen" => $ruta,
								   "epigrafe_imagen" => $_POST["editarEpigrafeImgGaleria"],
								   "descripcion_img_galeria" => $_POST["editarDescripcionImgGaleria"]);

					$respuesta = ModeloGaleriaImagenes::mdlEditarGaleriaImagen($tabla, $datos);

					if($respuesta == "ok"){

						echo '<script>

							swal.fire({
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "¡La Imagen se ha subido exitosamente a la galeria!",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
							}).then(function(result){

									if(result.value){

									   window.location = "galerias"; 
									 /*	history.back(); */  
									
									  } 
							});

						</script>';

					}	

				

			}else{

			 	echo '<script>

					swal.fire({

						type:"error",
						title: "¡CORREGIR!",
						text: "¡No se permiten ciertos caracteres, En titulo solo (\= \; \? \“\ ”\ ¿\ !\ ¡\ :\ ,\ .\ $\ -\ ), En la descripcion ( ,\ .\ )",
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

	/*=====  End of Editar Imagen ======*/


	/*=============================================
	Eliminar Imagen de Galeria
	=============================================*/

	static public function ctrEliminarGaleriaImagen($id, $ruta){
		
		unlink("../".$ruta);//borro la ruta de la imagen es decir borro el archivo de la carpeta


		$tabla = "galeria_imagen";

		$respuesta = ModeloGaleriaImagenes::mdlEliminarGaleriaImagen($tabla, $id);

		return $respuesta;

	}



}