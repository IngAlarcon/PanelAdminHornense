<?php

require_once "../controladores/galeriaTapas.controlador.php";
require_once "../modelos/galeriaTapas.modelo.php";

class TablaGaleriaTapas{

	/*======================================
	=            Tabla Galeria Tapas            =
	======================================*/
	
	public function mostrarTabla(){

		$tapas = ControladorGaleriaTapas::ctrMostrarGaleriaTapas(null, null);

		if(count($tapas)== 0){

			$datosJson = '{"data": []}';

			echo $datosJson;

			return;
		}

		$datosJson = '{ 

			"data": [ ';

			foreach ($tapas as $key => $value) {

				/*==============================
				=            IMAGEN            =
				==============================*/
				
                $imagen = "<div class='card collapsed-card'><div class='card-header'><h3 class='card-title'>Ver Imagen</h3><div class='card-tools'><button type='button' class='btn btn-tool' data-card-widget='collapse' data-toggle='tooltip' title='Collapse'><i class='fas fa-plus' aria-hidden='true'></i></button></div></div><div class='card-body'><div class='my-4'><img src='".$value["ruta_img_tapa"]."' class='img-fluid'><hr><p><strong>Descripcion: </strong> ".$value["descripcion_tapa"]." </p></div></div></div>";

				/*=====  End of IMAGEN  ======*

			
				
				/*================================
				=            ACCIONES            =
				================================*/
				
				$acciones = "<div class='btn-group'><button class='btn btn-warning btn-sm text-white editarTapa' data-dismiss='modal' data-toggle='modal' data-target='#editarTapa' idTapa='".$value["id_tapa"]."'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm eliminarTapa' idTapa='".$value["id_tapa"]."' imgTapa='".$value["ruta_img_tapa"]."'><i class='fas fa-trash-alt'></i></button></div>";

				/*=====  End of ACCIONES  ======*/


				$datosJson.= '[


				              "'.($key+1).'",
				              "'.$imagen.'",
				              "'.$value["fecha_tapa"].'",
				              "'.$acciones.'"


			          ],';
			    
			}

			$datosJson = substr($datosJson, 0, -1);

			$datosJson.= ']

		}';

		echo $datosJson;


	}
	
	
	/*=====  End of Tabla Galeria Tapas  ======*/

}


/*====================================
=            Tabla Galeria Tapas            =
====================================*/

$tabla = new TablaGaleriaTapas();
$tabla -> mostrarTabla();


/*=====  End of Tabla Galeria Tapas  ======*/