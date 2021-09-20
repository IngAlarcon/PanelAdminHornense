/* Aplicando el Plugin DataTable a mi tabla con la clase */
$(".tablaAdministradores").DataTable({
	/*Codigo para que se muestre los datos json en mi tabla sacado de la documentacion de dataTable*/

	"ajax":"ajax/tablaAdministradores.ajax.php",
	"deferRender": true,
	"retrieve": true,
	"processing": true,/*me muestra el proceso de carga*/
    "info": false, // desavilitando informacion de datos de la tabla
    "paginate": false,// desavilitando paginacion 
    "filter": false,// desavilitando buscador
    


/* Aplicando codigo para que la tabla sea en español*/
    "language": {
        "decimal": ",",
        "thousands": ".",
        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "infoPostFix": "",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "lengthMenu": "Mostrar _MENU_ registros",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
        "processing": "Procesando...",
        "search": "Buscar:",
        "searchPlaceholder": "Término de búsqueda",
        "zeroRecords": "No se encontraron resultados",
        "emptyTable": "Ningún dato disponible en esta tabla",
        "aria": {
            "sortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        //only works for built-in buttons, not for custom buttons
        "buttons": {
            "create": "Nuevo",
            "edit": "Cambiar",
            "remove": "Borrar",
            "copy": "Copiar",
            "csv": "fichero CSV",
            "excel": "tabla Excel",
            "pdf": "documento PDF",
            "print": "Imprimir",
            "colvis": "Visibilidad columnas",
            "collection": "Colección",
            "upload": "Seleccione fichero...."
        },
        "select": {
            "rows": {
                _: '%d filas seleccionadas',
                0: 'clic fila para seleccionar',
                1: 'una fila seleccionada'
            }
        }
    }                    
});


/*===== fin  Aplicando el Plugin DataTable a mi tabla    ======*/


/*============================================
=            Editar Administardor            =
============================================*/

$(document).on("click", ".editarAdministrador", function(){//$(document).on lo uso para cualquier tipo de pantalla por si el boton aparece despues o antes y no tener problemas en capturar el id en js

    var idAdministrador = $(this).attr("idAdministrador"); //capturando el id admin en una variable 

    //Hacemos una peticion AJAX

    var datos = new  FormData();
    datos.append("idAdministrador", idAdministrador);

    $.ajax({

    	     url:"ajax/administradores.ajax.php",
    	     method: "POST",
    	     data: datos,
    	     cache: false,
    	     contentType: false,
    	     processData: false,
    	     dataType: "json",
    	     success:function(respuesta){

    	     	//asignando los valores que estan en mi frontend a js 

    	     	$('input[name="editarId"]').val(respuesta["id"]); //para saber que usuario voy a modeificar

    	     	$('input[name="editarNombre"]').val(respuesta["nombre"]);
    	     	$('input[name="editarUsuario"]').val(respuesta["usuario"]);
    	     	$('input[name="passwordActual"]').val(respuesta["password"]);  

                 $('.editarPerfilOption').val(respuesta["perfil"]);
                 $('.editarPerfilOption').html(respuesta["perfil"]);    	     	
    	     	    	     
    	      }
      })
})
/*=====  End of Editar Administardor  ======*/

/*=======================================
=    Activar o Desactivar Administrador           
===========================================*/
$(document).on("click", ".btnActivar", function(){

	var idAdmin = $(this).attr("idAdmin");
	var estadoAdmin = $(this).attr("estadoAdmin");
    var boton = $(this);

	var datos = new FormData();
	datos.append("idAdmin", idAdmin);
	datos.append("estadoAdmin", estadoAdmin);


	$.ajax({

	     url:"ajax/administradores.ajax.php",
	     method: "POST",
	     data: datos,
	     cache: false,
	     contentType: false,
	     processData: false,
	     success: function(respuesta){
      	
      	if(respuesta == "ok"){

      		if(estadoAdmin == 0){

      			 $(boton).removeClass('btn-info');
      			 $(boton).addClass('btn-dark');
      			 $(boton).html('Desactivado');
      			 $(boton).attr('estadoAdmin', 1);



      		}else{

	            $(boton).addClass('btn-info');
	            $(boton).removeClass('btn-dark');
	            $(boton).html('Activado');
	            $(boton).attr('estadoAdmin',0);

	        }

      	}

	        swal.fire({
                type:"success",
                  title: "¡Se ha actualizado el estado!",
                  showConfirmButton: true,
                confirmButtonText: "Cerrar"
                
              }).then(function(result){

                  if(result.value){

                      window.location = "administradores";   
                    /*history.back();*/
                  
                    } 
              });


      }

	})

})

/*=====  End of Activar o Desactivar Administrador ======*/

/*==============================================
=            Eliminar Administrador            =
==============================================*/
$(document).on("click", ".eliminarAdministrador", function(){


	var idAdministrador = $(this).attr("idAdministrador");

	if(idAdministrador == 1){

		swal.fire({
			title: "Error",
			text: "Este Administrador no se puede eliminar",
			type: "error",
			confirmButtonText: "¡Cerrar!"

		});
	    
	   return;//para cancelar cualquier codigo de ahi en adelante
	}

	     swal.fire({
	 	   
	 	     title: "¿Esta seguro de eliminar este administrador?",
	 	     text: "¡Si no lo esta puede cancelar la accion!",
	 	     type:"warning",
	 	     showCancelButton: true,
             confirmButtonColor:"#3085d6",
             cancelButtonColor: "#d33",
	 	     cancelButtonText: "Cancelar",
	 	     confirmButtonText: "Si, eliminar administrador"}).then(function(result){

	 	     	if(result.value){//si acepto elininar se ejecuta lo siguiente
	 	     		//creo una variable para almacenar los datos y hacer un peticion ajax

	 	     		var datos = new FormData();
	 	     		datos.append("idEliminar", idAdministrador);

	 	     		$.ajax({

					     url:"ajax/administradores.ajax.php",
					     method: "POST",
					     data: datos,
					     cache: false,
					     contentType: false,
					     processData: false,
					     success: function(respuesta){

					     	if(respuesta == "ok"){

					     		 swal.fire({

		         	     	     type:"success",
		         	     	     title: "¡CORRECTO!",
		         	     	     text: "El administrador ha sido borrado correctamente",
		         	     	     showConfirmButton: true,
		         	     	     confirmButtonText: "Cerrar",
		         	     	     closeOnConfirm:false
		         	     	     }).then(function(result){

		         	     	     	if(result.value){
                                       window.location = "administradores";
		         	     	     	}

		         	     	     	});

					      	}

               }

	 	     		})

	 	     }

  	});


})


/*=====  End of Eliminar Administrador  ======*/

