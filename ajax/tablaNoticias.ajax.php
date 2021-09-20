<?php

require_once "../controladores/noticias.controlador.php";
require_once "../modelos/noticias.modelo.php";

class TablaNoticias{

	/*======================================
	=            Tabla Noticias            =
	======================================*/
	
	public function mostrarTabla(){

		$noticias = ControladorNoticias::ctrMostrarNoticias(null, null);

		if(count($noticias)== 0){

			$datosJson = '{"data": []}';

			echo $datosJson;

			return;
		}

		$datosJson = '{ 

			"data": [ ';

			foreach ($noticias as $key => $value) {

				/*==============================
				=            IMAGEN            =
				==============================*/
            $imagen = $value["img_portada_ruta"];
            $video = $value["video_codigo"];

				if( $imagen != null ){

                   $portadaNoticia = "<div class='card collapsed-card'><div class='card-header'><h3 class='card-title'>Ver Imagen</h3><div class='card-tools'><button type='button' class='btn btn-tool' data-card-widget='collapse' data-toggle='tooltip' title='Collapse'><i class='fas fa-minus' aria-hidden='true'></i></button></div></div><div class='card-body'><div class='my-4'><img src='".$value["img_portada_ruta"]."' class='img-fluid' style='width: 100%;'></div></div></div>";


				}else{

					if( $video != null ){

                          $portadaNoticia = "<div class='card collapsed-card'><div class='card-header'><h3 class='card-title'>Ver video</h3><div class='card-tools'><button type='button' class='btn btn-tool' data-card-widget='collapse' data-toggle='tooltip' title='Collapse'><i class='fas fa-minus' aria-hidden='true'></i></button></div></div><div class='card-body'><div class='my-4'><iframe frameborder='0' src='//www.youtube.com/embed/".$value["video_codigo"]."' style='width: 374px; height: 162px; left: 0px; top: 0px;' class='note-video-clip'></iframe><br></div></div></div>";

				     }
				
                }

             

				/*=====  End of IMAGEN  ======*/

		   /*========================================
			=            Palabras claves             =
			========================================*/
			$p_claves_noticia = "";

			$jsonPalabras = json_decode($value["p_claves"], true);
		
		
            foreach ($jsonPalabras as $indice => $valor){

            	$p_claves_noticia .= "<span class='badge badge-secondary mx-1'>".$valor."</span>";
            }

		/*=====	  	  End of Palabras claves   ======*/

                 $categoria = ucwords($value["id_categoria_noticia"]);

				$contenido = "<button class='btn btn-block btn-info btn-sm text-white verNoticias' data-toggle='modal' data-target='#verNoticias' idVerNoticia='".$value["id_noticia"]."'><i class='fas fa-file-alt'></i> Ver</button>";
				
				
				/*================================
				=            ACCIONES            =
				================================*/
				
				$acciones = "<div class='btn-group'><button class='btn btn-warning btn-sm text-white editarNoticia' data-toggle='modal' data-target='#editarNoticia' idNoticia='".$value["id_noticia"]."'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm eliminarNoticia' idNoticia='".$value["id_noticia"]."' rutaNoticia='".$value["ruta_noticia"]."'><i class='fas fa-trash-alt'></i></button></div>";

				/*=====  End of ACCIONES  ======*/


				$datosJson.= '[


				              "'.($key+1).'",
				              "'.$categoria.'",
				              "'.$portadaNoticia.'",
				              "'.$value["volanta"].'",
				              "'.$value["titulo_noticia"].'",
				              "'.$value["bajada"].'",
				              "'.$p_claves_noticia.'",
				              "'.$value["ruta_noticia"].'",
				              "'.$contenido.'",
				              "'.$acciones.'"


			          ],';
			    
			}

			$datosJson = substr($datosJson, 0, -1);

			$datosJson.= ']

		}';

		echo $datosJson;


	}
	
	
	/*=====  End of Tabla Noticias  ======*/

}


/*====================================
=            Tabla Noticias           =
====================================*/

$tabla = new TablaNoticias();
$tabla -> mostrarTabla();


/*=====  End of Tabla Noticias ======*/

