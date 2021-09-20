<?php

require_once "conexion.php";

class ModeloAdministradores{

	/*===============================================
	=            Mostrar Administradores            =
	===============================================*/
	static public function mdlMostrarAdministradores($tabla, $item, $valor){

		if($item != null && $valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch(); 

		}else{//si no se cumple la condicion anterior tomo todos los datos de mi tabla

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute(); 

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;
	}

	/*=====  End of Mostrar Administradores  ======*/

	/*===================================================
	=            Registro de administardores            =
	===================================================*/

	static public function mdlRegistroAdmin($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil, estado) VALUES (:nombre, :usuario, :password, :perfil, :estado)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR); 

		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);

		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);

		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
			print_r(Conexion::conectar()->errorInfo());
		}

		$stmt->close();
		$stmt = null;
	}
  /*=====  End of Registro de administardores  ======*/


  /*======================================
  =            Ediatar Admin            =
  ======================================*/
  	static public function mdlEditarAdmin($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, usuario = :usuario, password = :password WHERE id = :id");
       //, perfil = :perfil
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR); 

		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);

		//$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
			print_r(Conexion::conectar()->errorInfo());
		}

		$stmt->close();
		$stmt = null;
	}

  /*=====  End of Ediatar Admin  ======*/

  /*================================================
  =            Actualizar Administrador            =
  ================================================*/
  static public function mdlActualizarAdministrador($tabla, $item1, $valor1, $item2, $valor2){

	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item2 = :$item2 WHERE $item1 = :$item1");

	$stmt->bindParam(":".$item2, $valor2, PDO::PARAM_STR); 

	$stmt->bindParam(":".$item1, $valor1, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
			print_r(Conexion::conectar()->errorInfo());
		}

		$stmt->close();

		$stmt = null;
	}
  
  /*=====  End of Actualizar Administrador  ======*/

  /*==============================================
  =            ELIMINAR ADMINISTRADOR            =
  ==============================================*/

    static public function mdlEliminarAdmin($tabla, $id){

	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

	$stmt->bindParam(":id", $id, PDO::PARAM_INT); 


		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
			print_r(Conexion::conectar()->errorInfo());
		}

		$stmt->close();
		
		$stmt = null;
	}

  /*=====  End of ELIMINAR ADMINISTRADOR  ======*/
  
	
	
}

