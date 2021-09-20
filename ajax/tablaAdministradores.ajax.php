<?php

require_once "../controladores/administradores.controlador.php";
require_once "../modelos/administradores.modelo.php";

class TablaAdmin{
    #MIS METODOS
	/*=============================================
	=            Tabla Administradores            =
	=============================================*/
		public function mostrarTabla(){

			$respuesta = ControladorAdministradores::ctrMostrarAdministradores(null, null);

			if(count($respuesta) == 0){//verifico si desde mi bd no viene ningun item 

				$datosJson = '{"data":[]}';

				echo $datosJson;

				return;
			}
			
           $datosJson = '{

           	"data":[';


			foreach ($respuesta as $key => $value){//como mostrar si vienen datos de la BD

			  if ($value["id"] != 1 ){

                //creo mis variobles de acciones con html para mi json
	              if($value["estado"] == 0 ){
	                 //boton de Activar 
	                 $estado = "<button class='btn btn-dark btn-sm btnActivar' estadoAdmin='1' idAdmin='".$value["id"]."'>Desactivado</button>";

	              }else{

	              	$estado = "<button class='btn btn-info btn-sm btnActivar' estadoAdmin='0' idAdmin='".$value["id"]."'>Activado</button>";

	              }
              }else{

              	$estado = "<button class='btn btn-info btn-sm'>Activado</button>";

              }

				

				$acciones = "<div class='btn-group'><button class='btn btn-warning btn-sm text-white editarAdministrador' data-toggle='modal' data-target='#editarAdministrador' idAdministrador='".$value["id"]."'><i class='fas fa-pencil-alt text-white'></i></button></div>";

                   // <button class='btn btn-danger btn-sm eliminarAdministrador' idAdministrador='".$value["id"]."'><i class='fas fa-trash-alt'></i></button>

			$datosJson .='[
					     "'.($key+1).'",
					     "'.$value["nombre"].'",
					     "'.$value["usuario"].'",
					     "'.$value["perfil"].'",
					     "'.$estado.'",
					     "'.$acciones.'"

					     ],';			     				     
             }

             //aqui con las dos lienas de codigo volvemos a lamacenar el codigojson pero en las ultimas lines boirramos la coma final y lo volvemos a guardar agregando ]}

             $datosJson = substr($datosJson, 0, -1); // aqui se borra la coma de la cadena json

			$datosJson .=']}'; // aqui se cierrra la cadena json agregando lo que falta

			echo $datosJson;


	    }
	
	/*=====  End of Tabla Administradores  ======*/
	





}

#MIS OBJETOS
/*=============================================
=            Tabla Administradores   
=============================================*/
 $tabla = new TablaAdmin();
 $tabla -> mostrarTabla();


/*=====  End of Tabla Administradores  ======*/