<?php

require_once "../controladores/publicidad.controlador.php";
require_once "../modelos/publicidad.modelo.php";


class AjaxPublicidad{

	/*=============================================
	Editar Publicidad
	=============================================*/	

	public $idPublicidad;

	public function ajaxMostrarPublicidad(){

		$respuesta = ControladorPublicidad::ctrMostrarPublicidad("id_publicidad", $this->idPublicidad);

		echo json_encode($respuesta);

	}


	 /*=============================================
	Eliminar Publicidad
	=============================================*/	

	public $idEliminar;
	public $imgPublicidad;


	public function ajaxEliminarPublicidad(){

		$respuesta = ControladorPublicidad::ctrEliminarPublicidad($this->idEliminar, $this->imgPublicidad);

		echo $respuesta;

	}




}


/*=============================================
Editar  Publicidad
=============================================*/	

if(isset($_POST["idPublicidad"])){

	$editar = new AjaxPublicidad();
	$editar -> idPublicidad = $_POST["idPublicidad"];
	$editar -> ajaxMostrarPublicidad();

}


/*=============================================
Eliminar Publicidad
=============================================*/	

if(isset($_POST["idEliminar"])){

	$eliminar = new AjaxPublicidad();
	$eliminar -> idEliminar = $_POST["idEliminar"];
	$eliminar -> imgPublicidad = $_POST["imgPublicidad"];
	$eliminar -> ajaxEliminarPublicidad();

}


