<?php

require '../controladores/newsletter.controlador.php';
require '../modelos/newsletter.modelo.php';


class TablaNewsletter{

	/*======================================
	=            Tabla Newsletter           =
	======================================*/
	
	public function mostrarTabla(){

		$newsletter = ControladorNewsletter::ctrMostrarNewsletter(null, null);

		if(count($newsletter)== 0){

			$datosJson = '{"data": []}';

			echo $datosJson;

			return;
		}

		$datosJson = '{ 

			"data": [ ';

			foreach ($newsletter as $key => $value) {


				$fecha = date("d-m-Y", strtotime($value["fecha_newsletter"]));

				$datosJson.= '[


				              "'.($key+1).'",
				              "'.$value["email"].'",
				              "'.$fecha.'"

			          ],';
			    
			}

			$datosJson = substr($datosJson, 0, -1);

			$datosJson.= ']

		}';

		echo $datosJson;


	}
	
	
	/*=====  End of Tabla Newsletter ======*/

}


/*====================================
=            Tabla Newsletter           =
====================================*/

$tabla = new TablaNewsletter();
$tabla -> mostrarTabla();


/*=====  End of Tabla Newsletter  ======*/
