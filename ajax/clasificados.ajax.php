<?php

require_once "../controladores/clasificados.controlador.php";
require_once "../modelos/clasificados.modelo.php";


class AjaxClasificados{

	/*=============================================
	Editar Clasificados
	=============================================*/	

	public $idClasificado;

	public function ajaxMostrarClasificado(){

		$respuesta = ControladorClasificados::ctrMostrarClasificados("id_clasificado", $this->idClasificado);

		echo json_encode($respuesta);

	}



	/*=============================================
	Eliminar Clasificado
	=============================================*/	

	public $idEliminar;
	public $imgClasificado;


	public function ajaxEliminarClasificado(){

		$respuesta = ControladorClasificados::ctrEliminarClasificado($this->idEliminar, $this->imgClasificado);

		echo $respuesta;

	}

}

/*=============================================
Editar  Clasificados
=============================================*/	

if(isset($_POST["idClasificado"])){

	$editar = new AjaxClasificados();
	$editar -> idClasificado = $_POST["idClasificado"];
	$editar -> ajaxMostrarClasificado();

}


/*=============================================
Eliminar Tapa
=============================================*/	

if(isset($_POST["idEliminar"])){

	$eliminar = new AjaxClasificados();
	$eliminar -> idEliminar = $_POST["idEliminar"];
	$eliminar -> imgClasificado = $_POST["imgClasificado"];
	$eliminar -> ajaxEliminarClasificado();

}
