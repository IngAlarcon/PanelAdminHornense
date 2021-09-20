<?php

require_once "../controladores/galeriaTapas.controlador.php";
require_once "../modelos/galeriaTapas.modelo.php";


class AjaxGaleriaTapas{

	/*=============================================
	Editar Tapa
	=============================================*/	

	public $idTapa;

	public function ajaxMostrarGaleriaTapas(){

		$respuesta = ControladorGaleriaTapas::ctrMostrarGaleriaTapas("id_tapa", $this->idTapa);

		echo json_encode($respuesta);

	}

   /*=============================================
	Eliminar Tapa
	=============================================*/	

	public $idEliminar;
	public $imgTapa;


	public function ajaxEliminarGaleriaTapas(){

		$respuesta = ControladorGaleriaTapas::ctrEliminarGaleriaTapa($this->idEliminar, $this->imgTapa);

		echo $respuesta;

	}

}

/*=============================================
Editar Tapas
=============================================*/	

if(isset($_POST["idTapa"])){

	$editar = new AjaxGaleriaTapas();
	$editar -> idTapa = $_POST["idTapa"];
	$editar -> ajaxMostrarGaleriaTapas();

}

/*=============================================
Eliminar Tapa
=============================================*/	

if(isset($_POST["idEliminar"])){

	$eliminar = new AjaxGaleriaTapas();
	$eliminar -> idEliminar = $_POST["idEliminar"];
	$eliminar -> imgTapa = $_POST["imgTapa"];
	$eliminar -> ajaxEliminarGaleriaTapas();

}
