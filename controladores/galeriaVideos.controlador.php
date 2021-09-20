<?php

class ControladorGaleriaVideos{


	/*=====================================================
	=            Mostrar Registro de Galeria Videos             =
	=====================================================*/
	static public function ctrMostrarGaleriaVideos($item, $valor){

		$tabla = "galeria_video";

		$respuesta = ModeloGaleriaVideos::mdlMostrarGaleriaVideos($tabla, $item, $valor);

		return $respuesta;

	}
	/*=====  End of Mostrar Registro de Galeria Videos   ======*/


	  /*==========================================
	=            Registro de Galeria Video      =
	==========================================*/
	
	public function ctrRegistroGaleriaVideo(){

		if(isset($_POST["selecCategoriaVideo"])){
			
			 if(preg_match('/^[\/\=\\;\\?\\“\\”\\¿\\!\\¡\\:\\,\\.\\$\\-\\ a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["tituloVideo"]) &&
			 	preg_match('/^[\/\=\\_\\-\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/', $_POST["codigoVideo"]) && $_POST["selecCategoriaVideo"] != null){



					$tabla = "galeria_video";
					
					$datos = array("id_categoria_video" => $_POST["selecCategoriaVideo"],
						           "titulo_video" => $_POST["tituloVideo"],
								   "codigo_video" => $_POST["codigoVideo"]);

					$respuesta = ModeloGaleriaVideos::mdlRegistroGaleriaVideo($tabla, $datos);

					if($respuesta == "ok"){

						echo '<script>

							swal.fire({
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "¡El video se ha subido exitosamente a la galeria!",
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
						text: "¡No se permiten ciertos caracteres!, solo (\= \; \? \“\ ”\ ¿\ !\ ¡\ :\ ,\ .\ $\ -\ ) o Revisar si ha seleccionado una seccion",
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
	=            Editar de Galeria Video      =
	==========================================*/
	
	public function ctrEditarGaleriaVideo(){

		if(isset($_POST["idVideo"])){
			
			 if(preg_match('/^[\/\=\\;\\?\\“\\”\\¿\\!\\¡\\:\\,\\.\\$\\-\\ a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTituloVideo"]) && $_POST["editarSelecCategoriaVideo"] != null){

                    $rutaVideo = $_POST["codigoVideoActual"];

                    if(isset($_POST["editarCodigoVideo"])){

                    	$rutaVideo = $_POST["editarCodigoVideo"];
                    }

					$tabla = "galeria_video";
					
					$datos = array("id_video" => $_POST["idVideo"],
						           "id_categoria_video" => $_POST["editarSelecCategoriaVideo"],
						           "titulo_video" => $_POST["editarTituloVideo"],
								   "codigo_video" => $rutaVideo);

					$respuesta = ModeloGaleriaVideos::mdlEditarGaleriaVideo($tabla, $datos);

					if($respuesta == "ok"){

						echo '<script>

							swal.fire({
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "¡El video se ha actualizado correctamente en la galeria!",
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
						text: "¡No se permiten ciertos caracteres!, solo (\= \; \? \“\ ”\ ¿\ !\ ¡\ :\ ,\ .\ $\ -\ ) o Revisar si ha seleccionado una seccion",
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

    /*=============================================
	Eliminar Video
	=============================================*/

	static public function ctrEliminarGaleriaVideo($id){



		$tabla = "galeria_video";

		$respuesta = ModeloGaleriaVideos::mdlEliminarGaleriaVideo($tabla, $id);

		return $respuesta;

	}










}