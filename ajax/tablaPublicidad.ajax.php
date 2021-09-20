<?php

require_once "../controladores/publicidad.controlador.php";
require_once "../modelos/publicidad.modelo.php";

class TablaPublicidad{

	/*======================================
	=            Tabla Publicidad            =
	======================================*/
	
	public function mostrarTabla(){

		$publicidad = ControladorPublicidad::ctrMostrarPublicidad(null, null);

		if(count($publicidad)== 0){

			$datosJson = '{"data": []}';

			echo $datosJson;

			return;
		}

		$datosJson = '{ 

			"data": [ ';

			foreach ($publicidad as $key => $value) {

				/*==============================
				=            IMAGEN            =
				==============================*/
				
                $imagen = "<div class='card collapsed-card'><div class='card-header'><h3 class='card-title'>Ver Publicidad</h3><div class='card-tools'><button type='button' class='btn btn-tool' data-card-widget='collapse' data-toggle='tooltip' title='Collapse'><i class='fas fa-plus' aria-hidden='true'></i></button></div></div><div class='card-body'><div class='my-4'><a href='".$value["url_publicidad"]."' target='_blank'><img src='".$value["ruta_img_publicidad"]."' class='img-fluid'></a></div></div></div>";

				/*=====  End of IMAGEN  ======*/

			 $categoria = ucwords($value["id_categoria_publi"]);	
				
				/*================================
				=            ACCIONES            =
				================================*/
				
				$acciones = "<div class='btn-group'><button class='btn btn-warning btn-sm text-white editarPublicidad' data-dismiss='modal' data-toggle='modal' data-target='#editarPublicidad' idPublicidad='".$value["id_publicidad"]."'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm eliminarPublicidad' idPublicidad='".$value["id_publicidad"]."' imgPublicidad='".$value["ruta_img_publicidad"]."'><i class='fas fa-trash-alt'></i></button></div>";

				/*=====  End of ACCIONES  ======*/
				$fechaBD = date("d-m-Y", strtotime($value["fecha_publicidad"]));


				$datosJson.= '[


				              "'.($key+1).'",
				              "'.$categoria.'",
				              "'.$imagen.'",
				              "'.$value["disposicion"].'",
				              "'.$value["url_publicidad"].'",
				              "'.$fechaBD.'",
				              "'.$acciones.'"


			          ],';
			    
			}

			$datosJson = substr($datosJson, 0, -1);

			$datosJson.= ']

		}';

		echo $datosJson;


	}
	
	
	/*=====  End of Tabla Publicidad ======*/

}


/*====================================
=            Tabla Publicidad           =
====================================*/

$tabla = new TablaPublicidad();
$tabla -> mostrarTabla();


/*=====  End of Tabla Publicidad ======*/





