<?php

class ControladorGaleriaTapas{


	/*=====================================================
	=            Mostrar Registro de Galeria Tapas             =
	=====================================================*/
	static public function ctrMostrarGaleriaTapas($item, $valor){

		$tabla = "galeria_tapa";

		$respuesta = ModeloGaleriaTapas::mdlMostrarGaleriaTapas($tabla, $item, $valor);

		return $respuesta;

	}
	/*=====  End of Mostrar Registro de Galeria Tapas   ======*/

   /*==========================================
	=            Registro de Galeria Tapa        =
	==========================================*/
	
	public function ctrRegistroGaleriaTapa(){

		if(isset($_POST["fechaTapa"])){

			
			 if(preg_match('/^[\/\\,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["descripcionTapa"]) && 

			    preg_match('/^[\/\\-\\ a-zA-Z0-9 ]+$/', $_POST["fechaTapa"]) ){

				if(isset($_FILES["subirImgTapa"]["tmp_name"]) && !empty($_FILES["subirImgTapa"]["tmp_name"])){


					$tamano_archivo = $_FILES['subirImgTapa']['size'];

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PLAN
					=============================================*/

					$directorio = "vistas/img/galerias/tapas";		

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["subirImgTapa"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(10000,99999);

						$ruta = $directorio."/tapa_".$aleatorio.".jpg";//ruta en donde voy a guardar el archivo

						$origen = imagecreatefromjpeg($_FILES["subirImgTapa"]["tmp_name"]);//guardo temporal mente mi archivo de donde este para trabajarlo


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

						if($_FILES["subirImgTapa"]["type"] == "image/png"){

						$quality = 9; // calidad del png

						$aleatorio = mt_rand(10000,99999);

						$ruta = $directorio."/tapa_".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["subirImgTapa"]["tmp_name"]);						

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

					$tabla = "galeria_tapa";

					
					$datos = array("ruta_img_tapa" => $ruta,
								   "descripcion_tapa" => $_POST["descripcionTapa"],
								   "fecha_tapa" => $_POST["fechaTapa"]);

					$respuesta = ModeloGaleriaTapas::mdlRegistroGaleriaTapa($tabla, $datos);

					if($respuesta == "ok"){

						echo '<script>

							swal.fire({
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "¡La Tapa se ha creado exitosamente!",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
							}).then(function(result){

									if(result.value){

									    window.location = "galerias";   
										/*history.back();*/
									
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
						text: "¡No se permiten caracteres especiales!",
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

	/*=====  End of Registro de Tapa  ======*/



   /*==========================================
	=            Editar  Tapa        =
	==========================================*/
	
	public function ctrEditarGaleriaTapa(){

		if(isset($_POST["idTapa"])){

			
			 if(preg_match('/^[\/\\,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcionTapa"]) && 

			    preg_match('/^[\/\\-\\ a-zA-Z0-9 ]+$/', $_POST["editarFechaTapa"]) ){



			   	$ruta = $_POST["imgTapalActual"];


				if(isset($_FILES["editarImgTapa"]["tmp_name"]) && !empty($_FILES["editarImgTapa"]["tmp_name"])){


					$tamano_archivo = $_FILES['editarImgTapa']['size'];

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PLAN
					=============================================*/

					$directorio = "vistas/img/galerias/tapas";	

					/*==========================================================================
					=            PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA DB            =
					==========================================================================*/
					
					if(isset($_POST["imgTapalActual"])){

						unlink($_POST["imgTapalActual"]); //Eliminando imagen antigua de la carpeta  
					}


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarImgTapa"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(10000,99999);

						$ruta = $directorio."/tapa_".$aleatorio.".jpg";//ruta en donde voy a guardar el archivo

						$origen = imagecreatefromjpeg($_FILES["editarImgTapa"]["tmp_name"]);//guardo temporal mente mi archivo de donde este para trabajarlo


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

						if($_FILES["editarImgTapa"]["type"] == "image/png"){

						$quality = 9; // calidad del png

						$aleatorio = mt_rand(10000,99999);

						$ruta = $directorio."/tapa_".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarImgTapa"]["tmp_name"]);						

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

					$tabla = "galeria_tapa";

					
					$datos = array("id_tapa" => $_POST["idTapa"],
						           "ruta_img_tapa" => $ruta,
								   "descripcion_tapa" => $_POST["editarDescripcionTapa"],
								   "fecha_tapa" => $_POST["editarFechaTapa"]);

					$respuesta = ModeloGaleriaTapas::mdlEditarGaleriaTapa($tabla, $datos);

					if($respuesta == "ok"){

						echo '<script>

							swal.fire({
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "¡La Tapa se ha actualizado correctamente!",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
							}).then(function(result){

									if(result.value){

									    window.location = "galerias";   
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
						text: "¡No se permiten caracteres especiales!",
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
	Eliminar Tapa
	=============================================*/

	static public function ctrEliminarGaleriaTapa($id, $ruta){
		
		unlink("../".$ruta);//borro la ruta de la imagen es decir borro el archivo de la carpeta


		$tabla = "galeria_tapa";

		$respuesta = ModeloGaleriaTapas::mdlEliminarGaleriaTapa($tabla, $id);

		return $respuesta;

	}


}