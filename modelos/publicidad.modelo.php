<?php

require_once "conexion.php";

class ModeloPublicidad{

	/*=================================================
	=            Mostrar registro Publicidad            =
	=================================================*/

	static public function mdlMostrarPublicidad($tabla, $item, $valor){

		if($item != null && $valor != null){


			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch(); 

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_publicidad DESC");

			$stmt -> execute();

			return $stmt -> fetchAll(); 

		}

		$stmt -> close();

		$stmt = null;

	}
	/*=====  End of Mostrar registro Publicidad  ======*/
    

    	/*=======================================
	=            Registro de Publicidad           =
	=======================================*/
	static public function mdlRegistroPublicidad($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_categoria_publi, disposicion, ruta_img_publicidad, url_publicidad) VALUES (:id_categoria_publi, :disposicion, :ruta_img_publicidad, :url_publicidad)");

		$stmt->bindParam(":id_categoria_publi", $datos["id_categoria_publi"], PDO::PARAM_STR);
		$stmt->bindParam(":disposicion", $datos["disposicion"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta_img_publicidad", $datos["ruta_img_publicidad"], PDO::PARAM_STR);
		$stmt->bindParam(":url_publicidad", $datos["url_publicidad"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=====  End of Registro de Publicidad ======*/


	/*=============================================
	Editar Publicidad
	=============================================*/

	static public function mdlEditarPublicidad($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_categoria_publi = :id_categoria_publi, disposicion = :disposicion, ruta_img_publicidad = :ruta_img_publicidad, url_publicidad = :url_publicidad WHERE id_publicidad = :id_publicidad");

		$stmt->bindParam(":id_categoria_publi", $datos["id_categoria_publi"], PDO::PARAM_STR);
		$stmt->bindParam(":disposicion", $datos["disposicion"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta_img_publicidad", $datos["ruta_img_publicidad"], PDO::PARAM_STR);
		$stmt->bindParam(":url_publicidad", $datos["url_publicidad"], PDO::PARAM_STR);
		$stmt->bindParam(":id_publicidad", $datos["id_publicidad"], PDO::PARAM_INT);

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
	Eliminar Publicidad
	=============================================*/

	static public function mdlEliminarPublicidad($tabla, $id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_publicidad = :id");

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