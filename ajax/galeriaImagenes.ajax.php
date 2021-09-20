<?php

require_once "../controladores/galeriaImagenes.controlador.php";
require_once "../modelos/galeriaImagenes.modelo.php";


class AjaxGaleriaImagenes{

	/*=============================================
	Editar Imagen
	=============================================*/	

	public $idImagen;

	public function ajaxMostrarGaleriaImagenes(){

		$respuesta = ControladorGaleriaImagenes::ctrMostrarGaleriaImagenes("id_imagen", $this->idImagen);

		echo json_encode($respuesta);

	}

	 /*=============================================
	Eliminar Tapa
	=============================================*/	

	public $idEliminar;
	public $imgImagen;


	public function ajaxEliminarGaleriaImagenes(){

		$respuesta = ControladorGaleriaImagenes::ctrEliminarGaleriaImagen($this->idEliminar, $this->imgImagen);

		echo $respuesta;

	}

}




/*=============================================
Editar  Imagen
=============================================*/	

if(isset($_POST["idImagen"])){

	$editar = new AjaxGaleriaImagenes();
	$editar -> idImagen = $_POST["idImagen"];
	$editar -> ajaxMostrarGaleriaImagenes();

}


/*=============================================
Eliminar Imagen de Galeria
=============================================*/	

if(isset($_POST["idEliminar"])){

	$eliminar = new AjaxGaleriaImagenes();
	$eliminar -> idEliminar = $_POST["idEliminar"];
	$eliminar -> imgImagen = $_POST["imgImagen"];
	$eliminar -> ajaxEliminarGaleriaImagenes();

}
