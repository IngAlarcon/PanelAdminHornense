<?php

require_once "conexion.php";

class ModeloSociales{

	/*=================================================
	=            Mostrar registro Sociales            =
	=================================================*/

	static public function mdlMostrarSociales($tabla, $item, $valor){

		if($item != null && $valor != null){


			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch(); 

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_social DESC");

			$stmt -> execute();

			return $stmt -> fetchAll(); 

		}

		$stmt -> close();

		$stmt = null;

	}
	/*=====  End of Mostrar registro Sociales  ======*/
	
	/*=======================================
	=            Registro Social            =
	=======================================*/
	static public function mdlRegistroSocial($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(titulo_social, imagen_social_ruta, epigrafe_social_uno, descripcion_img_social, imagen_social_rutados, epigrafe_social_dos, descripcion_img_social_dos, imagen_social_rutatres, epigrafe_social_tres, descripcion_img_social_tres, imagen_social_rutacuatro, epigrafe_social_cuatro, descripcion_img_social_cuatro, contenido_social) VALUES (:titulo_social, :imagen_social_ruta, :epigrafe_social_uno, :descripcion_img_social, :imagen_social_rutados, :epigrafe_social_dos, :descripcion_img_social_dos, :imagen_social_rutatres, :epigrafe_social_tres, :descripcion_img_social_tres, :imagen_social_rutacuatro, :epigrafe_social_cuatro, :descripcion_img_social_cuatro, :contenido_social)");

		$stmt->bindParam(":titulo_social", $datos["titulo_social"], PDO::PARAM_STR);
		$stmt->bindParam(":imagen_social_ruta", $datos["imagen_social_ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":epigrafe_social_uno", $datos["epigrafe_social_uno"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion_img_social", $datos["descripcion_img_social"], PDO::PARAM_STR);		
		$stmt->bindParam(":imagen_social_rutados", $datos["imagen_social_rutados"], PDO::PARAM_STR);
		$stmt->bindParam(":epigrafe_social_dos", $datos["epigrafe_social_dos"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion_img_social_dos", $datos["descripcion_img_social_dos"], PDO::PARAM_STR);	
		$stmt->bindParam(":imagen_social_rutatres", $datos["imagen_social_rutatres"], PDO::PARAM_STR);
		$stmt->bindParam(":epigrafe_social_tres", $datos["epigrafe_social_tres"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion_img_social_tres", $datos["descripcion_img_social_tres"], PDO::PARAM_STR);		
		$stmt->bindParam(":imagen_social_rutacuatro", $datos["imagen_social_rutacuatro"], PDO::PARAM_STR);
		$stmt->bindParam(":epigrafe_social_cuatro", $datos["epigrafe_social_cuatro"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion_img_social_cuatro", $datos["descripcion_img_social_cuatro"], PDO::PARAM_STR);		
		$stmt->bindParam(":contenido_social", $datos["contenido_social"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=====  End of Registro Social  ======*/



	/*=============================================
	Editar Social
	=============================================*/

	static public function mdlEditarSocial($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo_social = :titulo_social, imagen_social_ruta = :imagen_social_ruta, epigrafe_social_uno = :epigrafe_social_uno, descripcion_img_social = :descripcion_img_social, imagen_social_rutados = :imagen_social_rutados, epigrafe_social_dos = :epigrafe_social_dos, descripcion_img_social_dos = :descripcion_img_social_dos, imagen_social_rutatres = :imagen_social_rutatres, epigrafe_social_tres = :epigrafe_social_tres, descripcion_img_social_tres = :descripcion_img_social_tres, imagen_social_rutacuatro = :imagen_social_rutacuatro, epigrafe_social_cuatro = :epigrafe_social_cuatro, descripcion_img_social_cuatro = :descripcion_img_social_cuatro, contenido_social = :contenido_social WHERE id_social = :id_social");

		$stmt->bindParam(":titulo_social", $datos["titulo_social"], PDO::PARAM_STR);
		$stmt->bindParam(":imagen_social_ruta", $datos["imagen_social_ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":epigrafe_social_uno", $datos["epigrafe_social_uno"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion_img_social", $datos["descripcion_img_social"], PDO::PARAM_STR);
		$stmt->bindParam(":imagen_social_rutados", $datos["imagen_social_rutados"], PDO::PARAM_STR);

		$stmt->bindParam(":epigrafe_social_dos", $datos["epigrafe_social_dos"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion_img_social_dos", $datos["descripcion_img_social_dos"], PDO::PARAM_STR);		
		$stmt->bindParam(":imagen_social_rutatres", $datos["imagen_social_rutatres"], PDO::PARAM_STR);

		$stmt->bindParam(":epigrafe_social_tres", $datos["epigrafe_social_tres"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion_img_social_tres", $datos["descripcion_img_social_tres"], PDO::PARAM_STR);		
		$stmt->bindParam(":imagen_social_rutacuatro", $datos["imagen_social_rutacuatro"], PDO::PARAM_STR);

		$stmt->bindParam(":epigrafe_social_cuatro", $datos["epigrafe_social_cuatro"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion_img_social_cuatro", $datos["descripcion_img_social_cuatro"], PDO::PARAM_STR);
		$stmt->bindParam(":contenido_social", $datos["contenido_social"], PDO::PARAM_STR);
		$stmt->bindParam(":id_social", $datos["id_social"], PDO::PARAM_INT);

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
	Eliminar Social
	=============================================*/

	static public function mdlEliminarSocial($tabla, $id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_social = :id");

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