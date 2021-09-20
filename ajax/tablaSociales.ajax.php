<?php

require_once "../controladores/sociales.controlador.php";
require_once "../modelos/sociales.modelo.php";

class TablaSociales{

	/*======================================
	=            Tabla Sociales            =
	======================================*/
	
	public function mostrarTabla(){

		$sociales = ControladorSociales::ctrMostrarSociales(null, null);

		if(count($sociales)== 0){

			$datosJson = '{"data": []}';

			echo $datosJson;

			return;
		}

		$datosJson = '{ 

			"data": [ ';

			foreach ($sociales as $key => $value) {

				/*==============================
				=            IMAGEN            =
				==============================*/
				
                $imagen = "<div class='card collapsed-card'><div class='card-header'><h3 class='card-title'>Ver Imagen</h3><div class='card-tools'><button type='button' class='btn btn-tool' data-card-widget='collapse' data-toggle='tooltip' title='Collapse'><i class='fas fa-minus' aria-hidden='true'></i></button></div></div><div class='card-body'><div class='my-4'><img src='".$value["imagen_social_ruta"]."' class='img-fluid'></div></div></div>";

				/*=====  End of IMAGEN  ======*/

				$contenido = "<button class='btn btn-block btn-info btn-sm text-white verSociales' data-toggle='modal' data-target='#verSociales' idVerSocial='".$value["id_social"]."'><i class='fas fa-file-alt'></i> Ver</button>";


				$fecha = date("d-m-Y", strtotime($value["fecha_social"]));
				
				/*================================
				=            ACCIONES            =
				================================*/
				
				$acciones = "<div class='btn-group'><button class='btn btn-warning btn-sm text-white editarSocial' data-toggle='modal' data-target='#editarSocial' idSocial='".$value["id_social"]."'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm eliminarSocial' idSocial='".$value["id_social"]."' imgSocial='".$value["imagen_social_ruta"]."' imgSocialdos='".$value["imagen_social_rutados"]."' imgSocialtres='".$value["imagen_social_rutatres"]."' imgSocialcuatro='".$value["imagen_social_rutacuatro"]."'><i class='fas fa-trash-alt'></i></button></div>";

				/*=====  End of ACCIONES  ======*/


				$datosJson.= '[


				              "'.($key+1).'",
				              "'.$imagen.'",
				              "'.$value["titulo_social"].'",
				              "'.$contenido.'",
				              "'.$fecha.'",
				              "'.$acciones.'"


			          ],';
			    
			}

			$datosJson = substr($datosJson, 0, -1);

			$datosJson.= ']

		}';

		echo $datosJson;


	}
	
	
	/*=====  End of Tabla Sociales  ======*/

}


/*====================================
=            Tabla Planes            =
====================================*/

$tabla = new TablaSociales();
$tabla -> mostrarTabla();


/*=====  End of Tabla Planes  ======*/

