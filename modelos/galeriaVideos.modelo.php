<?php

require_once "conexion.php";

class ModeloGaleriaVideos{

	/*=================================================
	=            Mostrar registro Galeria Videos            =
	=================================================*/

	static public function mdlMostrarGaleriaVideos($tabla, $item, $valor){

		if($item != null && $valor != null){


			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch(); 

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_video DESC");

			$stmt -> execute();

			return $stmt -> fetchAll(); 

		}

		$stmt -> close();

		$stmt = null;

	}
	/*=====  End of Mostrar registro Galeria Videos  ======*/

		/*=======================================
	=            Registro Video            =
	=======================================*/
	static public function mdlRegistroGaleriaVideo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_categoria_video, titulo_video, codigo_video) VALUES (:id_categoria_video, :titulo_video, :codigo_video)");

		$stmt->bindParam(":id_categoria_video", $datos["id_categoria_video"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo_video", $datos["titulo_video"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo_video", $datos["codigo_video"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=====  End of Registro Video  ======*/

   /*=============================================
	Editar Video de galeria
	=============================================*/

	static public function mdlEditarGaleriaVideo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_categoria_video = :id_categoria_video, titulo_video = :titulo_video, codigo_video = :codigo_video  WHERE id_video = :id_video");

		$stmt->bindParam(":id_categoria_video", $datos["id_categoria_video"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo_video", $datos["titulo_video"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo_video", $datos["codigo_video"], PDO::PARAM_STR);
		$stmt->bindParam(":id_video", $datos["id_video"], PDO::PARAM_INT);

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
	Eliminar Video
	=============================================*/

	static public function mdlEliminarGaleriaVideo($tabla, $id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_video = :id");

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