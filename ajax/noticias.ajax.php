<?php

require_once "../controladores/noticias.controlador.php";
require_once "../modelos/noticias.modelo.php";
require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";



class AjaxNoticias{

	/*=================================================
	=            Validar no repetir titulo            =
	=================================================*/
	public $validarTituloNoticia;

	public function ajaxValidarTitulo(){

		$item = "titulo_noticia";
		$valor = $this->validarTituloNoticia;

		$respuesta = ControladorNoticias::ctrValidarTituloNoticia($item, $valor);

		echo json_encode($respuesta);

	}

	/*=====  End of Validar no repetir titulo  ======*/

	/*=============================================
	Ver Noticia
	=============================================*/	

	public $idVerNoticia;

	public function ajaxVerNoticias(){

		$respuesta = ControladorNoticias::ctrMostrarNoticias("id_noticia", $this->idVerNoticia);

		echo json_encode($respuesta);

	}


	/*=============================================
	Editar Noticia
	=============================================*/	

	public $idNoticia;

	public function ajaxMostrarNoticias(){

		$respuesta = ControladorNoticias::ctrMostrarNoticias("id_noticia", $this->idNoticia);

		echo json_encode($respuesta);

	}


	/*=============================================
	Eliminar Noticia
	=============================================*/	

	public $idEliminar;
	public $rutaNoticia;


	public function ajaxEliminarNoticia(){

		$respuesta = ControladorNoticias::ctrEliminarNoticia($this->idEliminar, $this->rutaNoticia);

		echo $respuesta;

	}



}

	/*=================================================
	=            Validar no repetir titulo            =
	=================================================*/

	if(isset($_POST["validarTituloNoticia"])){

		$valTitulo = new AjaxNoticias();
		$valTitulo -> validarTituloNoticia = $_POST["validarTituloNoticia"];
		$valTitulo -> ajaxValidarTitulo();
	}

/*=============================================
Ver Social
=============================================*/	

if(isset($_POST["idVerNoticia"])){

	$ver = new AjaxNoticias();
	$ver -> idVerNoticia = $_POST["idVerNoticia"];
	$ver -> ajaxVerNoticias();

}

/*=============================================
Editar Noticia
=============================================*/	

if(isset($_POST["idNoticia"])){

	$editar = new AjaxNoticias();
	$editar -> idNoticia = $_POST["idNoticia"];
	$editar -> ajaxMostrarNoticias();

}



/*=============================================
Eliminar Noticia
=============================================*/	

if(isset($_POST["idEliminar"])){

	$eliminar = new AjaxNoticias();
	$eliminar -> idEliminar = $_POST["idEliminar"];
	$eliminar -> rutaNoticia = $_POST["rutaNoticia"];
	$eliminar -> ajaxEliminarNoticia();

}
