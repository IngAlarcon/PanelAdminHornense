<?php

require_once "conexion.php";

class ModeloClasificados{

	/*=================================================
	=            Mostrar registro Clasificados            =
	=================================================*/

	static public function mdlMostrarClasificados($tabla, $item, $valor){

		if($item != null && $valor != null){


			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch(); 

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_clasificado DESC");

			$stmt -> execute();

			return $stmt -> fetchAll(); 

		}

		$stmt -> close();

		$stmt = null;

	}
	/*=====  End of Mostrar registro Clasificados ======*/

		/*=======================================
	=            Registro Clasificado           =
	=======================================*/
	static public function mdlRegistroClasificado($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_categoria_clasificado, caracteristica, operacion, dia, detalles_clasificado, ruta_img_clasificado, url_clasificado) VALUES (:id_categoria_clasificado, :caracteristica, :operacion, :dia, :detalles_clasificado, :ruta_img_clasificado, :url_clasificado)");

		$stmt->bindParam(":id_categoria_clasificado", $datos["id_categoria_clasificado"], PDO::PARAM_STR);
		$stmt->bindParam(":caracteristica", $datos["caracteristica"], PDO::PARAM_STR);
		$stmt->bindParam(":operacion", $datos["operacion"], PDO::PARAM_STR);
		$stmt->bindParam(":dia", $datos["dia"], PDO::PARAM_STR);
		//$stmt->bindParam(":fecha_publicacion", $datos["fecha_publicacion"], PDO::PARAM_STR);
		$stmt->bindParam(":detalles_clasificado", $datos["detalles_clasificado"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta_img_clasificado", $datos["ruta_img_clasificado"], PDO::PARAM_STR);
		$stmt->bindParam(":url_clasificado", $datos["url_clasificado"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=====  End of Registro Clasificado======*/



	/*=============================================
	Editar Clasificado
	=============================================*/

	static public function mdlEditarClasificado($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_categoria_clasificado = :id_categoria_clasificado, caracteristica = :caracteristica, operacion = :operacion, dia = :dia, detalles_clasificado = :detalles_clasificado, ruta_img_clasificado = :ruta_img_clasificado, url_clasificado = :url_clasificado  WHERE id_clasificado = :id_clasificado");

		$stmt->bindParam(":id_categoria_clasificado", $datos["id_categoria_clasificado"], PDO::PARAM_STR);
		$stmt->bindParam(":caracteristica", $datos["caracteristica"], PDO::PARAM_STR);
		$stmt->bindParam(":operacion", $datos["operacion"], PDO::PARAM_STR);
		$stmt->bindParam(":dia", $datos["dia"], PDO::PARAM_STR);
		//$stmt->bindParam(":fecha_publicacion", $datos["fecha_publicacion"], PDO::PARAM_STR);
		$stmt->bindParam(":detalles_clasificado", $datos["detalles_clasificado"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta_img_clasificado", $datos["ruta_img_clasificado"], PDO::PARAM_STR);
		$stmt->bindParam(":url_clasificado", $datos["url_clasificado"], PDO::PARAM_STR);
		$stmt->bindParam(":id_clasificado", $datos["id_clasificado"], PDO::PARAM_INT);

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
	Eliminar Clasificado
	=============================================*/

	static public function mdlEliminarClasificado($tabla, $id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_clasificado = :id");

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