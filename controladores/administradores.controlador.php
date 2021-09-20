<?php

class ControladorAdministradores{

	/*==============================================
	=            Ingreso Adminstradores            =
	==============================================*/

	public function ctrIngresoAdministradores(){

		//preguntamos si viene una variable de tipo post
		if(isset($_POST["ingresoUsuario"])){
            //validando y filtrandolo que viene 
			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingresoUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingresoPassword"])){ //evita ataques sql

			   $encriptarPassword = crypt($_POST["ingresoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "administradores";
			    $item = "usuario";
			    $valor = $_POST["ingresoUsuario"];

			    $respuesta = ModeloAdministradores::mdlMostrarAdministradores($tabla, $item, $valor);
			    //con la respuesta que me trae del model hago una comparacion con mis condicones

			    if($respuesta["usuario"] == $_POST["ingresoUsuario"] && $respuesta["password"] == $encriptarPassword){

			      if($respuesta["estado"] == 1){	

			    	//Si todo se cumple creo mi variable de sesion
			    	$_SESSION["validarSesionBackend"] = "ok";
                    $_SESSION["idBackend"] = $respuesta["id"];

                    echo '<script>

                          window.location = "'.$_SERVER["REQUEST_URI"].'";

                          </script>';

                    //'.$_SERVER["REQUEST_URI"].' con esto capturo la url actual para  que con esa misma url nos redireccine despues
                          //$_SERVER varible REQUEST_URI captura la url actual
                   
                   }else{
				     
				     echo " <div class='alert bg-danger  small'>Error: El usuario esta desactivado.</div>";

                   }


			    }else{

				echo " <div class='alert bg-danger  small'>Error: Usuario y/o contraseña incorrectos. </div>";
			}

			}else{

				echo " <div class='alert bg-danger  small'>Error: No se permiten caracteres especiales. </div>";
			}
		}
	}	
	/*=====  End of Ingreso Adminstradores  ======*/
	
  
  /*===============================================
  =            Mostrar Administradores            =
  ===============================================*/

  static public function ctrMostrarAdministradores($item, $valor){

  	$tabla = "administradores";

  	$respuesta = ModeloAdministradores::mdlMostrarAdministradores($tabla, $item, $valor);

    return $respuesta;

  }

  /*=====  End of Mostrar Administradores  ======*/
  
  /*==================================================
  =            Registro de Administradores            =
  ==================================================*/

  public function ctrRegistroAdministrador(){

  	if(isset($_POST["registroNombre"])){

		if(preg_match('/^[a-zA-Z-áéíóúÁÉÍÓÚñÑ ]+$/', $_POST["registroNombre"]) &&
		   preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["registroUsuario"]) &&	
		   preg_match('/^[a-zA-Z0-9]+$/', $_POST["registroPassword"])){
		   	//Encriptando mi contraseña
		   	$encriptarPassword = crypt($_POST["registroPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');




		         //creo mi array para almacenar los datos que vienen y guardarlos en la BD
		   	     $tabla = "administradores";

		         $datos = array('nombre' => $_POST["registroNombre"],
						        'usuario' => $_POST["registroUsuario"],
						        'password' => $encriptarPassword, 
						        'perfil' => $_POST["registroPerfil"],
						        'estado' => 0);

		         $respuesta = ModeloAdministradores::mdlRegistroAdmin($tabla, $datos);

		         if($respuesta == "ok"){
		         	//Ejuto mi alerta suave

		         	echo '<script>

		         	     swal.fire({

		         	     	     type:"success",
		         	     	     title: "¡CORRECTO!",
		         	     	     text: "El administrador ha sido creado correctamente",
		         	     	     showConfirmButton: true,
		         	     	     confirmButtonText: "Cerrar"}).then(function(result){

		         	     	     	if(result.value){
                                       window.location = "administradores";
		         	     	     	}

		         	     	     	});

		         	</script>';


		         }

  
    	}else{

		  echo '<script>

				Swal.fire({
					  type: "error",
					  title: "Oops...",
					  text: "No se permiten caracteres especiales!",
					  footer: "<a>Vuelve a intentarlo.</a>"}).then(function(result){

		         	     	     	if(result.value){
                                       window.location = "administradores";
		         	     	     	}
					});

		         	</script>';

		// echo " <div class='alert bg-danger  small'>Error: No se permiten caracteres especiales.</div>"
  	   }

     }

   }

   /*===== a End of Registro de Administrdores  ======*/

	/*==============================
	=    Editar  Administrador     =
	==============================*/

	public function ctrEditarAdministrador(){

	  if(isset($_POST["editarNombre"])){

		if(preg_match('/^[a-zA-Z-áéíóúÁÉÍÓÚñÑ ]+$/', $_POST["editarNombre"]) &&
		   preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["editarUsuario"])){

		   	//condicion solo para mi contraseña si se cambia o no
		   	if($_POST["editarPassword"] != ""){

			   if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

			    $password = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');			   	

                 }else{


				    echo " <div class='alert bg-danger  small'>Error: No se permiten caracteres especiales.</div>";

	                 return;

                 }

			   }else{


			   	$password =  $_POST["passwordActual"];			   	

	    	}

		   	//creo mi array para almacenar los datos que vienen y guardarlos en la BD
		   	$tabla = "administradores";

		         $datos = array('id' => $_POST["editarId"],
		         	            'nombre' => $_POST["editarNombre"],
						        'usuario' => $_POST["editarUsuario"],
						        'password' => $password );//es la variable de arriba   
						      //  'perfil' => $_POST["editarPerfil"]);


		         $respuesta = ModeloAdministradores::mdlEditarAdmin($tabla, $datos);

		         if($respuesta == "ok"){
		         	//Ejuto mi alerta suave

		         	echo '<script>

		         	     swal.fire({

		         	     	     type:"success",
		         	     	     title: "¡CORRECTO!",
		         	     	     text: "El administrador ha sido editado correctamente",
		         	     	     showConfirmButton: true,
		         	     	     confirmButtonText: "Cerrar"}).then(function(result){

		         	     	     	if(result.value){
                                       window.location = "administradores";
		         	     	     	}

		         	     	     	});

		         	</script>';

		         }
  
    	}else{

		  echo '<script>

				Swal.fire({
					  type: "error",
					  title: "Oops...",
					  text: "No se permiten caracteres especiales!",
					  footer: "<a>Vuelve a intentarlo.</a>"}).then(function(result){

		         	     	     	if(result.value){
                                       window.location = "administradores";
		         	     	     	}
					});

		         	</script>';

		// echo " <div class='alert bg-danger  small'>Error: No se permiten caracteres especiales.</div>"
  	   }

     }

  }
  /*=====  End of Editar  Administrador ======*/

  /*=============================================
  =            Eliminar Adminitrador            =
  =============================================*/

  static public function ctrEliminarAdministrador($id){

  	$tabla = "administradores";

  	$respuesta = ModeloAdministradores::mdlEliminarAdmin($tabla, $id);

  	return $respuesta;

  }
  
  /*=====  End of Eliminar Adminitrador  ======*/
  
																																																																																																																												
}