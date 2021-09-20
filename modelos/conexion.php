<?php 

class Conexion{

	static public function conectar(){

		
		$link = new PDO("mysql:host=127.0.0.1:33065;dbname=base_nueva_git","root","");

		$link->exec("set name utf8");

		return $link;
	}


}