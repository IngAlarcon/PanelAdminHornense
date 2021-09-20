<?php

require_once "conexion.php";

class ModeloNoticias{

	/*=================================================
	=            Mostrar registro Noticias           =
	=================================================*/

	static public function mdlMostrarNoticias($tabla, $item, $valor){

		if($item != null && $valor != null){


			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch(); 

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_noticia DESC");

			$stmt -> execute();

			return $stmt -> fetchAll(); 

		}

		$stmt -> close();

		$stmt = null;

	}
	/*=====  End of Mostrar registro Noticias  ======*/


	/*=============================================
	Validar Titulo
	=============================================*/

	static public function mdlValidarTituloNoticia($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();
	

		$stmt -> close();

		$stmt = null;


	}

	/*=======================================
	=            Registro Noticias      =
	=======================================*/
	static public function mdlRegistroNoticia($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_categoria_noticia, ruta_inicio, volanta, titulo_noticia, bajada, ruta_noticia, p_claves, img_portada_ruta, epigrafe_portada, descripcion_portada, video_codigo, contenido_noticia, cantidad_vistas) VALUES (:id_categoria_noticia, :ruta_inicio, :volanta, :titulo_noticia, :bajada, :ruta_noticia, :p_claves, :img_portada_ruta, :epigrafe_portada, :descripcion_portada, :video_codigo, :contenido_noticia, :cantidad_vistas)");

		$stmt->bindParam(":id_categoria_noticia", $datos["id_categoria_noticia"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta_inicio", $datos["ruta_inicio"], PDO::PARAM_STR);
		$stmt->bindParam(":volanta", $datos["volanta"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo_noticia", $datos["titulo_noticia"], PDO::PARAM_STR);
		$stmt->bindParam(":bajada", $datos["bajada"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta_noticia", $datos["ruta_noticia"], PDO::PARAM_STR);
	
		$stmt->bindParam(":p_claves", $datos["p_claves"], PDO::PARAM_STR);
		$stmt->bindParam(":img_portada_ruta", $datos["img_portada_ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":epigrafe_portada", $datos["epigrafe_portada"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion_portada", $datos["descripcion_portada"], PDO::PARAM_STR);

		$stmt->bindParam(":video_codigo", $datos["video_codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":contenido_noticia", $datos["contenido_noticia"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad_vistas", $datos["cantidad_vistas"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=====  End of Registro Noticias  ======*/

	/*=============================================
	Editar Social
	=============================================*/

	static public function mdlEditarNoticia($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_categoria_noticia = :id_categoria_noticia, ruta_inicio = :ruta_inicio, volanta = :volanta, titulo_noticia = :titulo_noticia, bajada = :bajada, ruta_noticia = :ruta_noticia, p_claves = :p_claves, img_portada_ruta = :img_portada_ruta, epigrafe_portada = :epigrafe_portada, descripcion_portada = :descripcion_portada, video_codigo = :video_codigo, contenido_noticia = :contenido_noticia, cantidad_vistas = :cantidad_vistas WHERE id_noticia = :id_noticia");

		$stmt->bindParam(":id_categoria_noticia", $datos["id_categoria_noticia"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta_inicio", $datos["ruta_inicio"], PDO::PARAM_STR);
		$stmt->bindParam(":volanta", $datos["volanta"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo_noticia", $datos["titulo_noticia"], PDO::PARAM_STR);
		$stmt->bindParam(":bajada", $datos["bajada"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta_noticia", $datos["ruta_noticia"], PDO::PARAM_STR);
		$stmt->bindParam(":p_claves", $datos["p_claves"], PDO::PARAM_STR);
		$stmt->bindParam(":img_portada_ruta", $datos["img_portada_ruta"], PDO::PARAM_STR);
	
		$stmt->bindParam(":epigrafe_portada", $datos["epigrafe_portada"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion_portada", $datos["descripcion_portada"], PDO::PARAM_STR);
		$stmt->bindParam(":video_codigo", $datos["video_codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":contenido_noticia", $datos["contenido_noticia"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad_vistas", $datos["cantidad_vistas"], PDO::PARAM_STR);
		
		$stmt->bindParam(":id_noticia", $datos["id_noticia"], PDO::PARAM_INT);

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
	Eliminar Noticias
	=============================================*/

	static public function mdlEliminarNoticia($tabla, $id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_noticia = :id");

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