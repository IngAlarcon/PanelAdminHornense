<?php

require_once "../controladores/clasificados.controlador.php";
require_once "../modelos/clasificados.modelo.php";


class TablaClasificados{

	/*======================================
	=            Tabla Clasificados            =
	======================================*/
	
	public function mostrarTabla(){

		$clasificadosinf = ControladorClasificados::ctrMostrarClasificados(null, null);

		if(count($clasificadosinf)== 0){

			$datosJson = '{"data": []}';

			echo $datosJson;

			return;
		}

		$datosJson = '{ 

			"data": [ ';

			foreach ($clasificadosinf as $key => $value) {



				$rutaImagen = $value["ruta_img_clasificado"];
				$url = $value["url_clasificado"];
				$detallesClasificado = $value["detalles_clasificado"];



				if($rutaImagen != null && $url != null && $detallesClasificado != null){

					$imagen = "<a href='".$url."'><img src='".$rutaImagen."' class='img-fluid'></a><hr><p><strong>Url:</strong>".$url."</p>";

					$detalles = "<p>".$detallesClasificado."</p>";


				}else{

					if($rutaImagen != null && $url != null){

					$imagen ="<a href='".$url."'><img src='".$rutaImagen."' class='img-fluid'></a><hr><p><strong>Url:</strong>".$url."</p>";

					$detalles = "<p>Sin detalles</p>";

					}else{

						
							if($rutaImagen != null && $detallesClasificado != null   ){



							    $imagen ="<img src='".$rutaImagen."' class='img-fluid'><hr><p><strong>Url:</strong>SIn url</p>";

						     	$detalles = "<p>".$detallesClasificado."</p>";




						}else{


							if($detallesClasificado != null ){

								$imagen ="<p>Sin imagen</p>";

								$detalles = "<p>".$detallesClasificado."</p>";




							}else{


							if($rutaImagen != null){

									$imagen ="<img src='".$rutaImagen."' class='img-fluid'><hr><p><strong>Url:</strong> Sin Url</p>";

								    $detalles = "<p>Sin detalles</p>";


							}

						}




						}


					}



				}


				/*=============================
				=            Fecha            =
				=============================*/

			   $fechaBD = date("d-m-Y", strtotime($value["fecha_clasificado"]));//sutrayendo la fecha de la bd y modificando para mostrarlo en el panel

              // $fecha = "<p>".$value["dia"].",".$value["fecha_publicacion"]."</p>";
               $fecha = "<p>".$value["dia"].", ".$fechaBD."</p>";

				/*=====  End of Fecha  ======*/

               $categoria = ucwords($value["id_categoria_clasificado"]);	
				
				/*================================
				=            ACCIONES            =
				================================*/
				
				$acciones = "<div class='btn-group'><button class='btn btn-warning btn-sm text-white editarClasificado' data-dismiss='modal' data-toggle='modal' data-target='#editarClasificado' idClasificado='".$value["id_clasificado"]."'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm eliminarClasificado' idClasificado='".$value["id_clasificado"]."' imgClasificado='".$value["ruta_img_clasificado"]."'><i class='fas fa-trash-alt'></i></button></div>";

				/*=====  End of ACCIONES  ======*/


				$datosJson.= '[


				              "'.($key+1).'",
				              "'.$categoria.'",
				              "'.$imagen.'",
				              "'.$value["caracteristica"].'",
				              "'.$value["operacion"].'",
				              "'.$detalles.'",
				              "'.$fecha.'",
				              "'.$acciones.'"


			          ],';
			    
			}

			$datosJson = substr($datosJson, 0, -1);

			$datosJson.= ']

		}';

		echo $datosJson;


	}
	
	
	/*=====  End of Tabla Clasificados  ======*/

}


/*====================================
=            Tabla Clasificados           =
====================================*/

$tabla = new TablaClasificados();
$tabla -> mostrarTabla();


/*=====  End of Tabla Clasificados======*/





