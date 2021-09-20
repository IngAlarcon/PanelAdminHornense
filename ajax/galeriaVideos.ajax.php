<?php

require_once "../controladores/galeriaVideos.controlador.php";
require_once "../modelos/galeriaVideos.modelo.php";



class AjaxGaleriaVideos{

	/*=============================================
	Editar Video
	=============================================*/	

	public $idVideo;

	public function ajaxMostrarGaleriaVideos(){

		$respuesta = ControladorGaleriaVideos::ctrMostrarGaleriaVideos("id_video", $this->idVideo);

		echo json_encode($respuesta);

	}

	/*=============================================
	Eliminar Video
	=============================================*/	

	public $idEliminar;

	public function ajaxEliminarGaleriaVideo(){

		$respuesta = ControladorGaleriaVideos::ctrEliminarGaleriaVideo($this->idEliminar);

		echo $respuesta;

	}



}

/*=============================================
Editar Tapas
=============================================*/	

if(isset($_POST["idVideo"])){

	$editar = new AjaxGaleriaVideos();
	$editar -> idVideo = $_POST["idVideo"];
	$editar -> ajaxMostrarGaleriaVideos();

}

/*=============================================
Eliminar Video
=============================================*/	

if(isset($_POST["idEliminar"])){

	$eliminar = new AjaxGaleriaVideos();
	$eliminar -> idEliminar = $_POST["idEliminar"];
	$eliminar -> ajaxEliminarGaleriaVideo();

}
