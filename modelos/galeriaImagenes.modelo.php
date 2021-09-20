<?php

require_once "conexion.php";

class ModeloGaleriaImagenes{

	/*=================================================
	=            Mostrar registro Galeria Imagenes            =
	=================================================*/

	static public function mdlMostrarGaleriaImagenes($tabla, $item, $valor){

		if($item != null && $valor != null){


			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch(); 

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_imagen DESC");

			$stmt -> execute();

			return $stmt -> fetchAll(); 

		}

		$stmt -> close();

		$stmt = null;

	}
	/*=====  End of Mostrar registro Galeria Imagenes  ======*/


	/*=======================================
	=            Registro Imagen            =
	=======================================*/
	static public function mdlRegistroGaleriaImagen($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_categoria_img, titulo_imagen, ruta_imagen, epigrafe_imagen, descripcion_img_galeria) VALUES (:id_categoria_img, :titulo_imagen, :ruta_imagen, :epigrafe_imagen, :descripcion_img_galeria)");

		$stmt->bindParam(":id_categoria_img", $datos["id_categoria_img"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo_imagen", $datos["titulo_imagen"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta_imagen", $datos["ruta_imagen"], PDO::PARAM_STR);
		$stmt->bindParam(":epigrafe_imagen", $datos["epigrafe_imagen"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion_img_galeria", $datos["descripcion_img_galeria"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=====  End of Registro Imagen  ======*/

	/*=============================================
	Editar Imagen de galeria
	=============================================*/

	static public function mdlEditarGaleriaImagen($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_categoria_img = :id_categoria_img, titulo_imagen = :titulo_imagen, ruta_imagen = :ruta_imagen, epigrafe_imagen = :epigrafe_imagen, descripcion_img_galeria = :descripcion_img_galeria WHERE id_imagen = :id_imagen");

		$stmt->bindParam(":id_categoria_img", $datos["id_categoria_img"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo_imagen", $datos["titulo_imagen"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta_imagen", $datos["ruta_imagen"], PDO::PARAM_STR);
		$stmt->bindParam(":epigrafe_imagen", $datos["epigrafe_imagen"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion_img_galeria", $datos["descripcion_img_galeria"], PDO::PARAM_STR);
		$stmt->bindParam(":id_imagen", $datos["id_imagen"], PDO::PARAM_INT);

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
	Eliminar Imagen de Galeria
	=============================================*/

	static public function mdlEliminarGaleriaImagen($tabla, $id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_imagen = :id");

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