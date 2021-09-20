<?php

require_once "../controladores/sociales.controlador.php";
require_once "../modelos/sociales.modelo.php";

class AjaxSociales{

	/*=============================================
	Editar Social
	=============================================*/	

	public $idSocial;

	public function ajaxMostrarSociales(){

		$respuesta = ControladorSociales::ctrMostrarSociales("id_social", $this->idSocial);

		echo json_encode($respuesta);

	}


   /*=============================================
	Ver Social
	=============================================*/	

	public $idVerSocial;

	public function ajaxVerSociales(){

		$respuesta = ControladorSociales::ctrMostrarSociales("id_social", $this->idVerSocial);

		echo json_encode($respuesta);

	}


	/*=============================================
	Eliminar Social
	=============================================*/	

	public $idEliminar;
	public $imgSocial;
	public $imgSocialdos;
	public $imgSocialtres;
	public $imgSocialcuatro;

	public function ajaxEliminarSocial(){

		$respuesta = ControladorSociales::ctrEliminarSocial($this->idEliminar, $this->imgSocial, $this->imgSocialdos, $this->imgSocialtres, $this->imgSocialcuatro);

		echo $respuesta;

	}


}

/*=============================================
Editar Social
=============================================*/	

if(isset($_POST["idSocial"])){

	$editar = new AjaxSociales();
	$editar -> idSocial = $_POST["idSocial"];
	$editar -> ajaxMostrarSociales();

}

/*=============================================
Ver Social
=============================================*/	

if(isset($_POST["idVerSocial"])){

	$ver = new AjaxSociales();
	$ver -> idVerSocial = $_POST["idVerSocial"];
	$ver -> ajaxVerSociales();

}


/*=============================================
Eliminar Social
=============================================*/	

if(isset($_POST["idEliminar"])){

	$eliminar = new AjaxSociales();
	$eliminar -> idEliminar = $_POST["idEliminar"];
	$eliminar -> imgSocial = $_POST["imgSocial"];
	$eliminar -> imgSocialdos = $_POST["imgSocialdos"];
	$eliminar -> imgSocialtres = $_POST["imgSocialtres"];
	$eliminar -> imgSocialcuatro = $_POST["imgSocialcuatro"];
	$eliminar -> ajaxEliminarSocial();

}
