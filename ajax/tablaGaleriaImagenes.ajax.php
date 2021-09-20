<?php

require_once "../controladores/galeriaImagenes.controlador.php";
require_once "../modelos/galeriaImagenes.modelo.php";

class TablaGaleriaImagenes{

	/*======================================
	=            Tabla Galeria Imagenes            =
	======================================*/
	
	public function mostrarTabla(){

		$imagenes = ControladorGaleriaImagenes::ctrMostrarGaleriaImagenes(null, null);

		if(count($imagenes)== 0){

			$datosJson = '{"data": []}';

			echo $datosJson;

			return;
		}

		$datosJson = '{ 

			"data": [ ';

			foreach ($imagenes as $key => $value) {

				/*==============================
				=            IMAGEN            =
				==============================*/
				
                $imagen = "<div class='card collapsed-card'><div class='card-header'><h3 class='card-title'>Ver Imagen</h3><div class='card-tools'><button type='button' class='btn btn-tool' data-card-widget='collapse' data-toggle='tooltip' title='Collapse'><i class='fas fa-plus' aria-hidden='true'></i></button></div></div><div class='card-body'><div class='my-4'><img src='".$value["ruta_imagen"]."' class='img-fluid'><hr><p><strong>Descripcion: </strong> ".$value["descripcion_img_galeria"]." </p></div></div></div>";

				/*=====  End of IMAGEN  ======*/

		 $categoria = ucwords($value["id_categoria_img"]);		
				
				/*================================
				=            ACCIONES            =
				================================*/
				
				$acciones = "<div class='btn-group'><button class='btn btn-warning btn-sm text-white editarImagen' data-dismiss='modal' data-toggle='modal' data-target='#editarImagen' idImagen='".$value["id_imagen"]."'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm eliminarImagen' idImagen='".$value["id_imagen"]."' imgImagen='".$value["ruta_imagen"]."'><i class='fas fa-trash-alt'></i></button></div>";

				/*=====  End of ACCIONES  ======*/


				$datosJson.= '[


				              "'.($key+1).'",
				              "'.$categoria.'",
				              "'.$imagen.'",
				              "'.$value["titulo_imagen"].'",
				              "'.$value["epigrafe_imagen"].'",
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
=            Tabla Galeria Imagenes           =
====================================*/

$tabla = new TablaGaleriaImagenes();
$tabla -> mostrarTabla();


/*=====  End of Tabla Galeria Imagenes ======*/