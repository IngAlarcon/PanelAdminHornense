<?php

class ControladorNewsletter{


	/*=====================================================
	=            Mostrar Registro de Newsletter             =
	=====================================================*/
	static public function ctrMostrarNewsletter($item, $valor){

		$tabla = "newsletter";

		$respuesta = ModeloNewsletter::mdlMostrarNewsletter($tabla, $item, $valor);

		return $respuesta;

	}
}