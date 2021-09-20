<?php

require_once "conexion.php";

class ModeloGaleriaTapas{

	/*=================================================
	=            Mostrar registro Galeria Tapas            =
	=================================================*/

	static public function mdlMostrarGaleriaTapas($tabla, $item, $valor){

		if($item != null && $valor != null){


			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch(); 

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_tapa DESC");

			$stmt -> execute();

			return $stmt -> fetchAll(); 

		}

		$stmt -> close();

		$stmt = null;

	}
	/*=====  End of Mostrar registro Galeria Tapas  ======*/


   /*=======================================
	=            Registro Galeria Tapa           =
	=======================================*/
	static public function mdlRegistroGaleriaTapa($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ruta_img_tapa, descripcion_tapa, fecha_tapa) VALUES (:ruta_img_tapa, :descripcion_tapa, :fecha_tapa)");

		$stmt->bindParam(":ruta_img_tapa", $datos["ruta_img_tapa"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion_tapa", $datos["descripcion_tapa"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_tapa", $datos["fecha_tapa"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=====  End of Registro Galeria Tapa ======*/


	/*=============================================
	Editar Tapa
	=============================================*/

	static public function mdlEditarGaleriaTapa($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET ruta_img_tapa = :ruta_img_tapa, descripcion_tapa = :descripcion_tapa, fecha_tapa = :fecha_tapa  WHERE id_tapa = :id_tapa");

		$stmt->bindParam(":ruta_img_tapa", $datos["ruta_img_tapa"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion_tapa", $datos["descripcion_tapa"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_tapa", $datos["fecha_tapa"], PDO::PARAM_STR);
		$stmt->bindParam(":id_tapa", $datos["id_tapa"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());

		}

		$stmt-> close();

		$stmt = null;

	}


	/*=============================================
	Eliminar Tapa
	=============================================*/

	static public function mdlEliminarGaleriaTapa($tabla, $id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_tapa = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());

		}

		$stmt -> close();

		$stmt = null;

	}






}