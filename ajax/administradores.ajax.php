<?php

require_once"../controladores/administradores.controlador.php";
require_once"../modelos/administradores.modelo.php";

class AjaxAdministradores{

	/*==============================================
	=            Editar Administradores            =
	==============================================*/
	public $idAdministrador;

	public function ajaxMostrarAdministradores(){

		$item = "id";
		$valor = $this->idAdministrador;//el valor que viene el la variable public $idAdministrador 

		$respuesta = ControladorAdministradores::ctrMostrarAdministradores($item, $valor);

		echo json_encode($respuesta);
	}
	/*=====  End of Editar Administradores  ======*/

	/*==========================================================
	=            Activar o Desactivar Administrador            =
	==========================================================*/
	public $idAdmin;
	public $estadoAdmin;

	public function ajaxActivarAdministrador(){

		$tabla = "administradores";

		$item1 = "id";
		$valor1 = $this->idAdmin;

		$item2 = "estado";
		$valor2 = $this->estadoAdmin;

		$respuesta = ModeloAdministradores::mdlActualizarAdministrador($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}

	/*=====  End of Activar o Desactivar Administrador  ======*/

	/*==============================================
	=            Eliminar Administardor            =
	==============================================*/
	
	public $idEliminar;

	public function ajaxEliminarAdministrador(){

		$respuesta = ControladorAdministradores::ctrEliminarAdministrador($this->idEliminar);

		echo $respuesta;

	}
		
	/*=====  End of Eliminar Administardor  ======*/
		
}

/*============================================
=            Editar Administardor            =
============================================*/
if(isset($_POST["idAdministrador"])){

	$editar = new AjaxAdministradores();
	$editar -> idAdministrador = $_POST["idAdministrador"]; 
	$editar -> ajaxMostrarAdministradores();
}

/*=====  End of Editar Administardor  ======*/

/*==================================================
=            Activar o desactivar Admin            =
==================================================*/
if(isset($_POST["estadoAdmin"])){

	$activarAdmin = new AjaxAdministradores();
	$activarAdmin -> idAdmin = $_POST["idAdmin"]; 
	$activarAdmin -> estadoAdmin = $_POST["estadoAdmin"]; 
	$activarAdmin -> ajaxActivarAdministrador();
}

/*=====  End of Activar o desactivar Admin  ======*/

/*============================================
=            Eliminar Administardor            =
============================================*/
if(isset($_POST["idEliminar"])){

	$eliminar = new AjaxAdministradores();
	$eliminar -> idEliminar = $_POST["idEliminar"]; 
	$eliminar -> ajaxEliminarAdministrador();
}

/*=====  End of Eliminar Administardor  ======*/



