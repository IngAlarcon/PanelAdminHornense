<?php

// $rutaBackend = ControladorRuta::ctrRutaBackend();

class ControladorNoticias{


	/*=====================================================
	=            Mostrar Registro de Noticias            =
	=====================================================*/
	static public function ctrMostrarNoticias($item, $valor){

		$tabla = "noticias";

		$respuesta = ModeloNoticias::mdlMostrarNoticias($tabla, $item, $valor);

		return $respuesta;

	}
	/*=====  End of Mostrar Registro de Noticias  ======*/

    /*=========================================
    =         Validar Titulo de mis Noticias =
    =========================================*/

    static public function ctrValidarTituloNoticia($item, $valor){

    $tabla = "noticias";

    $respuesta = ModeloNoticias::mdlValidarTituloNoticia($tabla, $item, $valor);

    return $respuesta;
  
  }

	/*==========================================
	=            Registro de Noticia       =
	==========================================*/
	
	public function ctrRegistroNoticia(){

		if(isset($_POST["selecCategoriaNoticia"])){
			
			 if($_POST["selecCategoriaNoticia"] != null &&
			 	preg_match('/^[\/\=\\;\\?\\“\\”\\¿\\!\\¡\\:\\,\\.\\$\\-\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["volantaNoticia"]) &&
			 	preg_match('/^[\/\=\\;\\?\\¿\\!\\¡\\:\\,\\.\\$\\-\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["tituloNoticia"]) &&
			 	preg_match('/^[\/\=\\;\\?\\“\\”\\¿\\!\\¡\\:\\,\\.\\$\\-\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["bajadaNoticia"]) &&
			 	preg_match('/^[\/\-\\a-zA-Z0-9 ]+$/', $_POST["rutaNotica"]) &&
			 	preg_match('/^[\/\=\\;\\?\\¿\\!\\¡\\:\\,\\.\\$\\-\\a-zA-Z0-9 ]+$/', $_POST["palablasClaves"])

			 ){
                //inicializando variables nulas 

			 	$ruta = null;
			    $epigrafe = null;
			    $descripcion = null;


			    if ($_POST["codigoVideoPortada"] == null && $_FILES["subirImgPortadaNoticia"]["tmp_name"] == null) {


			    	echo'<script>

							swal.fire({
									type:"error",
								  	title: "¡CORREGIR!",
								  	text: "¡Tiene que subir una portada  a la noticia!",
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


			 	//SI VIENE CODIGO DEL VIDEO DE PORTADA O NO//

			 	if ($_POST["codigoVideoPortada"] != null) {

			 		if (preg_match('/^[\/\=\\_\\-\\a-zA-Z0-9]+$/', $_POST["codigoVideoPortada"])){

                		$codigoPortada = $_POST["codigoVideoPortada"];

		        	    $epigrafe = null;
			            $descripcion = null;

                	}else{

                		echo'<script>

							swal.fire({
									type:"error",
								  	title: "¡CORREGIR!",
								  	text: "¡El codigo del video no se ingreso correctamente no debe tener espcio en blanco o ciertos caraceres especiales!",
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

                		$codigoPortada = null;
                	}


                /*=================================================================
                =            Guardoando las Palabras Claves para la BD            =
                =================================================================*/

                $p_claves_noticia = json_encode(explode(",", $_POST["palablasClaves"]));
                
                /*=====  End of Guardoando las Palabras Claves para la BD  ======*/
                
				/*=====================================================
				=    PREGUNTANDO SI VIENE IMAGEN DE PORTADA      =
				=====================================================*/

				if(isset($_FILES["subirImgPortadaNoticia"]["tmp_name"]) && !empty($_FILES["subirImgPortadaNoticia"]["tmp_name"])){


					$tamano_archivo = $_FILES['subirImgPortadaNoticia']['size'];

					/*=====================================================
					=            DEFINIENDO RUTA DE LA CARPETA            =
					=====================================================*/

                     $carpeta = $_POST["rutaNotica"];    
				

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DE PORTADA Y iMAGENES TEMPORALES
					=============================================*/

					$directorio = "vistas/img/noticias/".$carpeta."";

				   if(!file_exists($directorio)){ //pregunto si existe el directorio si no existe lo creo 

	                    mkdir($directorio, 0755);

	                }

	               /*=============================================
					CAPTURANDO EPIGRAFE Y DESCRIPCION
					=============================================*/

	                $epigrafe = $_POST["epigrafePortada"];

			      	$descripcion = $_POST["descripcionPortada"]; 	

					
					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["subirImgPortadaNoticia"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(10000,99999);

						$ruta = $directorio."/".$carpeta."_".$aleatorio.".jpg";//ruta en donde voy a guardar el archivo

						$origen = imagecreatefromjpeg($_FILES["subirImgPortadaNoticia"]["tmp_name"]);//guardo temporal mente mi archivo de donde este para trabajarlo


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

						if($_FILES["subirImgPortadaNoticia"]["type"] == "image/png"){

						$quality = 9; // calidad del png

						$aleatorio = mt_rand(10000,99999);

						$ruta = $directorio."/".$carpeta."_".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["subirImgPortadaNoticia"]["tmp_name"]);						

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

            	/*=====================================================
				=      PROCESANDO EL CONTENIDO DE MI NOTICIA          =
				=====================================================*/
	            
	           // $contenidoFinal = null;
			 	
			 	if ($_POST["contenidoNoticia"] != null) {

			 		if (preg_match('/^[\/\=\\&\\;\\_\\*\\@\\"\\“\\”\\#\\°\\+\\%\\<\\>\\?\\¿\\ü\\«\\»\\!\\…\\¡\\:\\,\\.\\$\\|\\-\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["contenidoNoticia"])){

			 			if($_FILES["subirImgPortadaNoticia"]["tmp_name"] == ""){

	                	/*=====================================================
						=            DEFINIENDO RUTA DE LA CARPETA            =
						=====================================================*/

	                     $carpeta = $_POST["rutaNotica"];    
					
						/*=============================================
						CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PLAN
						=============================================*/

						$directorio = "vistas/img/noticias/".$carpeta."";

					   if(!file_exists($directorio)){ //pregunto si existe el directorio si no existe lo creo 

		                    mkdir($directorio, 0755);

		                }

                     }

				 		 /*================================================================================
		                =            Filtrando las rutas scr de las imagenes de los contenido            =
		                ================================================================================*/

                		$contenido = $_POST["contenidoNoticia"];
                		$rutaBackend = ControladorRuta::ctrRutaBackend();

                	    // $rutaServidor = "http://localhost:8080/hornense/login/";
	                    //src=" http://localhost:8080/BackEndHornense/vistas/img/temp/noticias/ec8956637a99787bd197eacd77acce5e.jpg

		                //src=" http://localhost:8080/BackEndHornense/vistas/img/noticias/ec8956637a99787bd197eacd77acce5e.jpg $rutaBackend

	                    $contenidoFinal = str_replace('src="'.$rutaBackend.'vistas/img/temp/noticias', 'src="'.$rutaBackend.$directorio, $contenido);
		              	                
		                /*=====  End of Filtrando las rutas scr de las imagenes de los contenido  ======*/
                      

                	}else{

                		echo'<script>

							swal.fire({
									type:"error",
								  	title: "¡CORREGIR!",
								  	text: "¡El contenido de la noticia contiene caracteres especiales que no estan permitidos!",
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


                		echo'<script>

							swal.fire({
									type:"error",
								  	title: "¡CORREGIR!",
								  	text: "¡La Noticia no se puede subir sin contenido!",
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


                	/*===========================================================
	                =    Moviendo todos los ficheros temporales al destino final   
	                ===========================================================*/
	                $origentemp = glob('vistas/img/temp/noticias/*'); 
	                                      
	                foreach($origentemp as $fichero){

	                    copy($fichero, $directorio."/".substr($fichero, 25));

	                    unlink($fichero); 
	                    
	                } 

	                /*=====  End of   ======*/

                   /*===== Ruta inicio    ======*/

					 if ($_POST["selecCategoriaNoticia"] == "mundo animal") {
					  
					  $rutaInicio = "mundo-animal";

					  }elseif ($_POST["selecCategoriaNoticia"] == "espacio musical") {
					  	
                      $rutaInicio = "espacio-musical";

					  }elseif ($_POST["selecCategoriaNoticia"] == "espacio verde") {

					  	$rutaInicio = "espacio-verde";
					  
					  }elseif ($_POST["selecCategoriaNoticia"] == "espacio infantil") {
					  	
					  	$rutaInicio = "espacio-infantil";
					  
					  }else{

					  	$rutaInicio = $_POST["selecCategoriaNoticia"];
					  } 

                
                    $cantidadVistas = 0;


					$tabla = "noticias";
					
					$datos = array("id_categoria_noticia" => $_POST["selecCategoriaNoticia"],
						           "ruta_inicio" => $rutaInicio,
						           "volanta" => $_POST["volantaNoticia"],
						           "titulo_noticia" => $_POST["tituloNoticia"],
						           "bajada" => $_POST["bajadaNoticia"],
						           "ruta_noticia" => $_POST["rutaNotica"],
						           "p_claves" =>  $p_claves_noticia,
						           "img_portada_ruta" => $ruta,
								   "epigrafe_portada" => $epigrafe,
								   "descripcion_portada" => $descripcion,
								   "video_codigo" => $codigoPortada,
								   "contenido_noticia" => $contenidoFinal,
								   "cantidad_vistas" => $cantidadVistas);

					$respuesta = ModeloNoticias::mdlRegistroNoticia($tabla, $datos);

					if($respuesta == "ok"){

						echo '<script>

							swal.fire({
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "¡La Noticia se ha creado exitosamente!",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
							}).then(function(result){

									if(result.value){

									    window.location = "noticias";   
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
						text: "¡No se permiten ciertos caracteres, En titulo se permiten (\= \; \? \“\ ”\ ¿\ !\ ¡\ :\ ,\ .\ $\ -\ ), Revisar si ha seleccionado una seccion o las palabras claves que van sin tildes!",
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

	/*=====  End of Registro de Noticia ======*/



	/*==========================================
	=          Editar Noticia       =
	==========================================*/
	
	public function ctrEditarNoticia(){

		if(isset($_POST["idNoticia"])){
			
			 if($_POST["editarSelecCategoriaNoticia"] != null &&
			 	preg_match('/^[\/\=\\;\\?\\“\\”\\¿\\!\\¡\\:\\,\\.\\$\\-\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarVolantaNoticia"]) &&
			 	preg_match('/^[\/\=\\;\\?\\“\\”\\¿\\!\\¡\\:\\,\\.\\$\\-\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarBajadaNoticia"]) &&
			 	preg_match('/^[\/\=\\;\\?\\¿\\!\\¡\\:\\,\\.\\$\\-\\a-zA-Z0-9 ]+$/', $_POST["editarPalablasClaves"])){

                //inicializando variables nulas 
               
                $ruta = $_POST["subirPortadaNoticiaActual"];
            	$epigrafe =  $_POST["editarEpigrafePortada"];
				$descripcion =  $_POST["editarDescripcionPortada"];


                if($ruta == ""){// $ruta = null;

                	$ruta = null;
				    $epigrafe = null;
				    $descripcion = null;

                }



                $codigoPortada = $_POST["codigoVideoActual"];



			 	//SI VIENE CODIGO DEL VIDEO DE PORTADA O NO//

			 	if ($_POST["editarCodigoVideoPortada"] != null) {

			 		if (preg_match('/^[\/\=\\_\\-\\a-zA-Z0-9]+$/', $_POST["editarCodigoVideoPortada"])){

                		$codigoPortada = $_POST["editarCodigoVideoPortada"];


                	}else{

                		echo'<script>

							swal.fire({
									type:"error",
								  	title: "¡CORREGIR!",
								  	text: "¡El codigo del video no se ingreso correctamente no debe tener espcio en blanco o ciertos caraceres especiales!",
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

                		if($codigoPortada == ""){

                		    $codigoPortada = null;
                	  }

                	}


                /*=================================================================
                =            Guardoando las Palabras Claves para la BD            =
                =================================================================*/

                $p_claves_noticia = json_encode(explode(",", $_POST["editarPalablasClaves"]));
                
                /*=====  End of Guardoando las Palabras Claves para la BD  ======*/
                
				/*=====================================================
				=    PREGUNTANDO SI VIENE IMAGEN DE PORTADA      =
				=====================================================*/

				if(isset($_FILES["editarSubirImgPortadaNoticia"]["tmp_name"]) && !empty($_FILES["editarSubirImgPortadaNoticia"]["tmp_name"])){


					$tamano_archivo = $_FILES['editarSubirImgPortadaNoticia']['size'];

					/*=====================================================
					=            DEFINIENDO RUTA DE LA CARPETA            =
					=====================================================*/

                     $carpeta = $_POST["editarRutaNotica"];    
				

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DE PORTADA Y iMAGENES TEMPORALES
					=============================================*/

					$directorio = "vistas/img/noticias/".$carpeta."";

				   if(!file_exists($directorio)){ //pregunto si existe el directorio si no existe lo creo 

	                    mkdir($directorio, 0755);

	                }

	               /*=============================================
					CAPTURANDO EPIGRAFE Y DESCRIPCION
					=============================================*/

	                $epigrafe = $_POST["editarEpigrafePortada"];

			      	$descripcion = $_POST["editarDescripcionPortada"]; 	


			      	/*==========================================================================
					=            PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA DB            =
					==========================================================================*/
					
					if(isset($_POST["subirPortadaNoticiaActual"])){

						unlink($_POST["subirPortadaNoticiaActual"]);
					}				
					

					
					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarSubirImgPortadaNoticia"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(10000,99999);

						$ruta = $directorio."/".$carpeta."_".$aleatorio.".jpg";//ruta en donde voy a guardar el archivo

						$origen = imagecreatefromjpeg($_FILES["editarSubirImgPortadaNoticia"]["tmp_name"]);//guardo temporal mente mi archivo de donde este para trabajarlo


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

						if($_FILES["editarSubirImgPortadaNoticia"]["type"] == "image/png"){

						$quality = 9; // calidad del png

						$aleatorio = mt_rand(10000,99999);

						$ruta = $directorio."/".$carpeta."_".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarSubirImgPortadaNoticia"]["tmp_name"]);						

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

            	/*=====================================================
				=      PROCESANDO EL CONTENIDO DE MI NOTICIA          =
				=====================================================*/
	            
	           // $contenidoFinal = null;
			 	
			 	if ($_POST["editarContenidoNoticia"] != null) {

			 		if (preg_match('/^[\/\=\\&\\;\\_\\*\\@\\"\\“\\”\\#\\°\\+\\%\\<\\>\\?\\ü\\«\\»\\¿\\!\\…\\¡\\:\\,\\.\\$\\|\\-\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarContenidoNoticia"])){

			 			if($_FILES["editarSubirImgPortadaNoticia"]["tmp_name"] == ""){

	                	/*=====================================================
						=            DEFINIENDO RUTA DE LA CARPETA            =
						=====================================================*/

	                     $carpeta = $_POST["editarRutaNotica"];    
					
						/*=============================================
						CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PLAN
						=============================================*/

						$directorio = "vistas/img/noticias/".$carpeta."";

					   if(!file_exists($directorio)){ //pregunto si existe el directorio si no existe lo creo 

		                    mkdir($directorio, 0755);

		                }

                     }

				 		 /*================================================================================
		                =            Filtrando las rutas scr de las imagenes de los contenido            =
		                ================================================================================*/

                		$contenido = $_POST["editarContenidoNoticia"];
                		$rutaBackend = ControladorRuta::ctrRutaBackend();

                	    // $rutaServidor = "http://localhost:8080/hornense/login/";
	                    //src=" http://localhost:8080/BackEndHornense/vistas/img/temp/noticias/ec8956637a99787bd197eacd77acce5e.jpg

		                //src=" http://localhost:8080/BackEndHornense/vistas/img/noticias/ec8956637a99787bd197eacd77acce5e.jpg

	                    $contenidoFinal = str_replace('src="'.$rutaBackend.'vistas/img/temp/noticias', 'src="'.$rutaBackend.$directorio, $contenido);
		              	                
		                /*=====  End of Filtrando las rutas scr de las imagenes de los contenido  ======*/
                      

                	}else{

                		echo'<script>

							swal.fire({
									type:"error",
								  	title: "¡CORREGIR!",
								  	text: "¡El contenido de la noticia contiene caracteres especiales que no estan permitidos!",
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


                		echo'<script>

							swal.fire({
									type:"error",
								  	title: "¡CORREGIR!",
								  	text: "¡La Noticia no se puede subir sin contenido!",
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


                	/*===========================================================
	                =    Moviendo todos los ficheros temporales al destino final   
	                ===========================================================*/
	                $origentemp = glob('vistas/img/temp/noticias/*'); 
	                                      
	                foreach($origentemp as $fichero){

	                    copy($fichero, $directorio."/".substr($fichero, 25));

	                    unlink($fichero); 
	                    
	                } 

	                /*=====  End of   ======*/

                   /*===== Ruta inicio    ======*/

					 if ($_POST["editarSelecCategoriaNoticia"] == "mundo animal") {
					  
					  $rutaInicio = "mundo-animal";

					  }elseif ($_POST["editarSelecCategoriaNoticia"] == "espacio musical") {
					  	
                      $rutaInicio = "espacio-musical";

					  }elseif ($_POST["editarSelecCategoriaNoticia"] == "espacio verde") {

					  	$rutaInicio = "espacio-verde";
					  
					  }elseif ($_POST["editarSelecCategoriaNoticia"] == "espacio infantil") {
					  	
					  	$rutaInicio = "espacio-infantil";
					  
					  }else{

					  	$rutaInicio = $_POST["editarSelecCategoriaNoticia"];
					  } 


                    $cantidadVistas = 0;


					$tabla = "noticias";
					
					$datos = array("id_noticia" => $_POST["idNoticia"],
						           "id_categoria_noticia" => $_POST["editarSelecCategoriaNoticia"],
						           "ruta_inicio" => $rutaInicio,
						           "volanta" => $_POST["editarVolantaNoticia"],
						           "titulo_noticia" => $_POST["editarTituloNoticia"],
						           "bajada" => $_POST["editarBajadaNoticia"],
						           "ruta_noticia" => $_POST["editarRutaNotica"],
						           "p_claves" =>  $p_claves_noticia,
						           "img_portada_ruta" => $ruta,
								   "epigrafe_portada" => $epigrafe,
								   "descripcion_portada" => $descripcion,
								   "video_codigo" => $codigoPortada,
								   "contenido_noticia" => $contenidoFinal,
								   "cantidad_vistas" => $cantidadVistas);

					$respuesta = ModeloNoticias::mdlEditarNoticia($tabla, $datos);

					if($respuesta == "ok"){

						echo '<script>

							swal.fire({
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "¡La Noticia se edito exitosamente!",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
							}).then(function(result){

									if(result.value){

									    window.location = "noticias";   
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
						text: "¡No se permiten ciertos caracteres, En titulo se permiten (\= \; \? \“\ ”\ ¿\ !\ ¡\ :\ ,\ .\ $\ -\ ), Revisar si ha seleccionado una seccion o las palabras claves que van sin tildes!",
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

	/*=====  End of  Registro de Noticia ======*/


	/*=============================================
	Eliminar Noticia
	=============================================*/

	static public function ctrEliminarNoticia($id, $ruta){
		
	    // capturamos los archivos para eliminarlos uno por uno
    	 $origen = glob('../vistas/img/noticias/'.$ruta.'/*'); 

    	foreach($origen as $fichero){

            unlink($fichero); 
            
        } 

        //Eliminamos directorio

        rmdir('../vistas/img/noticias/'.$ruta);


		$tabla = "noticias";

		$respuesta = ModeloNoticias::mdlEliminarNoticia($tabla, $id);

		return $respuesta;

	}
		



}