<?php

class ControladorClasificados{


	/*=====================================================
	=            Mostrar Registro de Clasificados             =
	=====================================================*/
	static public function ctrMostrarClasificados($item, $valor){

		$tabla = "clasificados";

		$respuesta = ModeloClasificados::mdlMostrarClasificados($tabla, $item, $valor);

		return $respuesta;

	}
	/*=====  End of Mostrar Registro de Clasificados  ======*/


	/*==========================================
	=            Registro de Galeria Imagen        =
	==========================================*/
	
	public function ctrRegistroClasificado(){

		if(isset($_POST["caracteristicaClasificado"])){
			
			 if(preg_match('/^[\/\=\\;\\?\\“\\”\\¿\\!\\¡\\:\\,\\.\\$\\-\\ a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["caracteristicaClasificado"]) && 
			 	$_POST["operacionClasificado"] != null && 
			 	$_POST["selecCategoriaClasificado"] != null &&  
			 	$_POST["diaClasificado"] != null){
                   
                $ruta = null;
                
                $url = null;

			    if ($_POST["detallesClasificado"] == null && $_FILES["subirClasificado"]["tmp_name"] == null) {


			    	echo'<script>

							swal.fire({
									type:"error",
								  	title: "¡CORREGIR!",
								  	text: "¡El clasificado tiene que contener detalles o una imagen!",
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


                if ($_POST["detallesClasificado"] != null) {

                	if (preg_match('/^[\/\=\\&\\;\\_\\*\\@\\“\\”\\<\\>\\?\\¿\\!\\…\\º\\´\\¡\\:\\(\\)\\,\\.\\$\\|\\-\\ 0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["detallesClasificado"])) {

                		$contenido = $_POST["detallesClasificado"];

                	}else{

                    	echo'<script>

							swal.fire({
									type:"error",
								  	title: "¡CORREGIR!",
								  	text: "¡No se permiten ciertos caracteres en detalles, solo (/ \ =\ &\ ;\ _\ *\ @\ “\ ”\ <\ >\ ?\ ¿\ ! \…\ ¡\ :\ ,\ .\ $\ |\ - )!",
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
               	
                
                }else{

                	$contenido = null;

                }



              if ($_POST["urlClasificado"] != null) {


                	$url = $_POST["urlClasificado"];
                }


				if(isset($_FILES["subirClasificado"]["tmp_name"]) && !empty($_FILES["subirClasificado"]["tmp_name"])){


					$tamano_archivo = $_FILES['subirClasificado']['size'];

					/*=====================================================
					=            DEFINIENDO RUTA DE LA CARPETA            =
					=====================================================*/

					if($_POST["selecCategoriaClasificado"] == "transporte y fletes"){
						
						$carpeta = "transportes";

					}else{

						if($_POST["selecCategoriaClasificado"] == "oficios ofrecidos"){

							$carpeta = "oficios";
						
						}else{

							if($_POST["selecCategoriaClasificado"] == "jardineria y viveros"){

								$carpeta = "jardineria";
								
							}else{

								if($_POST["selecCategoriaClasificado"] == "compra y venta de articulos"){

									$carpeta = "compraventa";

								}else{
                                       
                                   $carpeta = $_POST["selecCategoriaClasificado"];    


								}
							}

						}
					}
										
					/*=====  End of DEFINIENDO RUTA DE LA CARPETA  ======*/

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PLAN
					=============================================*/

					$directorio = "vistas/img/clasificados/".$carpeta."";					
					
					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["subirClasificado"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(10000,99999);

						$ruta = $directorio."/".$carpeta."_".$aleatorio.".jpg";//ruta en donde voy a guardar el archivo

						$origen = imagecreatefromjpeg($_FILES["subirClasificado"]["tmp_name"]);//guardo temporal mente mi archivo de donde este para trabajarlo


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

						if($_FILES["subirClasificado"]["type"] == "image/png"){

						$quality = 9; // calidad del png

						$aleatorio = mt_rand(10000,99999);

						$ruta = $directorio."/".$carpeta."_".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["subirClasificado"]["tmp_name"]);						

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
	              
					$tabla = "clasificados";
					
					$datos = array("id_categoria_clasificado" => $_POST["selecCategoriaClasificado"],
						           "caracteristica" => $_POST["caracteristicaClasificado"],
						           "operacion" => $_POST["operacionClasificado"],
						           "dia" => $_POST["diaClasificado"],
						           "detalles_clasificado" => $contenido,
						           "ruta_img_clasificado" => $ruta,
								   "url_clasificado" => $url);

					$respuesta = ModeloClasificados::mdlRegistroClasificado($tabla, $datos);

					if($respuesta == "ok"){

						echo '<script>

							swal.fire({
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "¡EL Clasificado se ha subido exitosamente!",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
							}).then(function(result){

									if(result.value){

									  window.location = "clasificados";  
									 /* 	history.back();*/ 
									
									  } 
							});

						</script>';

					}	

			

			}else{

			 	echo '<script>

					swal.fire({

						type:"error",
						title: "¡CORREGIR!",
						text: "¡No se permiten ciertos caracteres, solo se permiten (\= \; \? \“\ ”\ ¿\ !\ ¡\ :\ ,\ .\ $\ -\ ), Revisar si ha seleccionado una categoria o operacion!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){

						/*	window.location = "clasificados";*/

							history.back();

						}

					});	

				</script>';

			}

		}

	}

	/*=====  End of Registro de Clasificado======*/

	/*==========================================
	=            Editar Clasificado      =
	==========================================*/
	
	public function ctrEditarClasificado(){

		if(isset($_POST["idClasificado"])){
			
			 if(preg_match('/^[\/\=\\;\\?\\“\\”\\¿\\!\\¡\\:\\,\\.\\$\\-\\ a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCaracteristicaClasificado"]) && 
			 	$_POST["editarOperacionClasificado"] != null && 
			 	$_POST["editarSelecCategoriaClasificado"] != null &&  
			 	$_POST["editarDiaClasificado"] != null){
                   
               // $ruta = null;
                $ruta = $_POST["subirClasificadoActual"];

                if($ruta == ""){

                	$ruta = null;
                }

                $url = null;

                if ($_POST["editarDetallesClasificado"] != null) {

                	if (preg_match('/^[\/\=\\&\\;\\_\\*\\@\\“\\”\\<\\>\\?\\¿\\!\\…\\º\\´\\¡\\:\\(\\)\\,\\.\\$\\|\\-\\ 0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDetallesClasificado"])) {

                		$contenido = $_POST["editarDetallesClasificado"];

                	}else{

                    	echo'<script>

							swal.fire({
									type:"error",
								  	title: "¡CORREGIR!",
								  	text: "¡No se permiten ciertos caracteres en detalles, solo (/ \ =\ &\ ;\ _\ *\ @\ “\ ”\ <\ >\ ?\ ¿\ ! \…\ ¡\ :\ ,\ .\ $\ |\ - )!",
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

                	
                
                }else{

                	$contenido = null;


                }


                 if ($_POST["editarUrlClasificado"] != null) {


                	$url = $_POST["editarUrlClasificado"];
                }


				if(isset($_FILES["editarSubirClasificado"]["tmp_name"]) && !empty($_FILES["editarSubirClasificado"]["tmp_name"])){


					$tamano_archivo = $_FILES['editarSubirClasificado']['size'];

					/*=====================================================
					=            DEFINIENDO RUTA DE LA CARPETA            =
					=====================================================*/

					if($_POST["editarSelecCategoriaClasificado"] == "transporte y fletes"){
						
						$carpeta = "transportes";

					}else{

						if($_POST["editarSelecCategoriaClasificado"] == "oficios ofrecidos"){

							$carpeta = "oficios";
						
						}else{

							if($_POST["editarSelecCategoriaClasificado"] == "jardineria y viveros"){

								$carpeta = "jardineria";
								
							}else{

								if($_POST["editarSelecCategoriaClasificado"] == "compra y venta de articulos"){

									$carpeta = "compraventa";

								}else{
                                       
                                   $carpeta = $_POST["editarSelecCategoriaClasificado"];    


								}
							}

						}
					}
										
					/*=====  End of DEFINIENDO RUTA DE LA CARPETA  ======*/

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PLAN
					=============================================*/

					$directorio = "vistas/img/clasificados/".$carpeta."";	


				/*==========================================================================
					=            PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA DB            =
					==========================================================================*/
					
					if(isset($_POST["subirClasificadoActual"])){

						unlink($_POST["subirClasificadoActual"]);
					}				
					
					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarSubirClasificado"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(10000,99999);

						$ruta = $directorio."/".$carpeta."_".$aleatorio.".jpg";//ruta en donde voy a guardar el archivo

						$origen = imagecreatefromjpeg($_FILES["editarSubirClasificado"]["tmp_name"]);//guardo temporal mente mi archivo de donde este para trabajarlo


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

						if($_FILES["editarSubirClasificado"]["type"] == "image/png"){

						$quality = 9; // calidad del png

						$aleatorio = mt_rand(10000,99999);

						$ruta = $directorio."/".$carpeta."_".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarSubirClasificado"]["tmp_name"]);						

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
					$tabla = "clasificados";
					
					$datos = array("id_clasificado" => $_POST["idClasificado"],
						           "id_categoria_clasificado" => $_POST["editarSelecCategoriaClasificado"],
						           "caracteristica" => $_POST["editarCaracteristicaClasificado"],
						           "operacion" => $_POST["editarOperacionClasificado"],
						           "dia" => $_POST["editarDiaClasificado"],
						           "detalles_clasificado" => $contenido,
						           "ruta_img_clasificado" => $ruta,
								   "url_clasificado" => $url);

					$respuesta = ModeloClasificados::mdlEditarClasificado($tabla, $datos);

					if($respuesta == "ok"){

						echo '<script>

							swal.fire({
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "¡EL Clasificado se ha actualizado correctamente!",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
							}).then(function(result){

									if(result.value){

									  window.location = "clasificados";  
									 /* 	history.back();*/ 
									
									  } 
							});

						</script>';

					}	

			

			}else{

			 	echo '<script>

					swal.fire({

						type:"error",
						title: "¡CORREGIR!",
						text: "¡No se permiten ciertos caracteres, solo se permiten (\= \; \? \“\ ”\ ¿\ !\ ¡\ :\ ,\ .\ $\ -\ ), Revisar si ha seleccionado una categoria o operacion!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){

						/*	window.location = "clasificados";*/

							history.back();

						}

					});	

				</script>';

			}

		}

	}

	/*=====  End of Editar Clasificado======*/

	/*=============================================
	Eliminar Clasificado
	=============================================*/

	static public function ctrEliminarClasificado($id, $ruta){
		
		unlink("../".$ruta);//borro la ruta de la imagen es decir borro el archivo de la carpeta


		$tabla = "clasificados";

		$respuesta = ModeloClasificados::mdlEliminarClasificado($tabla, $id);

		return $respuesta;

	}


}