<?php

require_once "../controladores/galeriaVideos.controlador.php";
require_once "../modelos/galeriaVideos.modelo.php";

class TablaGaleriaVideos{

	/*======================================
	=            Tabla Galeria Videos            =
	======================================*/
	
	public function mostrarTabla(){

		$videos = ControladorGaleriaVideos::ctrMostrarGaleriaVideos(null, null);

		if(count($videos)== 0){

			$datosJson = '{"data": []}';

			echo $datosJson;

			return;
		}

		$datosJson = '{ 

			"data": [ ';

			foreach ($videos as $key => $value) {

				/*==============================
				=            VIDEO           =
				==============================*/
				
                $video = "<div class='card collapsed-card'><div class='card-header'><h3 class='card-title'>Ver video</h3><div class='card-tools'><button type='button' class='btn btn-tool' data-card-widget='collapse' data-toggle='tooltip' title='Collapse'><i class='fas fa-minus' aria-hidden='true'></i></button></div></div><div class='card-body'><div class='my-4'><p class='my-3'><iframe frameborder='0' src='//www.youtube.com/embed/".$value["codigo_video"]."' width='100%' height='360' class='note_video-clip'></iframe></p></div></div></div>";

				/*=====  End of video  ======*/

				
			 $categoria = ucwords($value["id_categoria_video"]);	
				
				/*================================
				=            ACCIONES            =
				================================*/
				
				$acciones = "<div class='btn-group'><button class='btn btn-warning btn-sm text-white editarVideo' data-dismiss='modal' data-toggle='modal' data-target='#editarVideo' idVideo='".$value["id_video"]."'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm eliminarVideo' idVideo='".$value["id_video"]."'><i class='fas fa-trash-alt'></i></button></div>";

				/*=====  End of ACCIONES  ======*/


				$datosJson.= '[

				              "'.($key+1).'",
				              "'.$categoria.'",
				              "'.$value["titulo_video"].'",
				              "'.$video.'",				           
				              "'.$acciones.'"


			          ],';
			    
			}

			$datosJson = substr($datosJson, 0, -1);

			$datosJson.= ']

		}';

		echo $datosJson;


	}
	
	
	/*=====  End of Tabla Galeria Videos  ======*/

}


/*====================================
=            Tabla Galeria Videos           =
====================================*/

$tabla = new TablaGaleriaVideos();
$tabla -> mostrarTabla();


/*=====  End of Tabla Galeria Videos ======*/