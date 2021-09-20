
/*=====================================================
  Usando el Plugin jQuery Mask (enmascarando un Input)        
=====================================================*/

$(document).ready(function(){

	$("#fechaTapa").mask("00-00-0000")
	$("#editarFechaTapa").mask("00-00-0000")

});

/*=====  End of Usando el Plugin jQuery Mask (enmascarando un Input)  ======*/

/* Aplicando el Plugin DataTable a mi tabla con la clase */
 $(".tablaGaleriaTapas").DataTable({
 	/*Codigo para que se muestre los datos json en mi tabla sacado de la documentacion de dataTable*/

 	"ajax":"ajax/tablaGaleriaTapas.ajax.php",
 	"deferRender": true,
 	"retrieve": true,
 	"processing": true,/*me muestra el proceso de carga*/


 /* Aplicando codigo para que la tabla sea en español*/
     "language": {
         "decimal": ",",
         "thousands": ".",
         "info": "Mostrando registros del _START_ al _END_",
         "infoEmpty": "Mostrando registros del 0 al 0 ",
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

/*=============================================
Subir imagen temporal ImgTapa
=============================================*/

$("input[name='subirImgTapa']").change(function(){

  var imagen = this.files[0];/*capturo la info del archivo imagen que se va a subir*/
  
  	/*=============================================
	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
	=============================================*/

	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

	 $("input[name='subirImgTapa']").val("");

	   swal.fire({
	      title: "Error al subir la imagen",
	      text: "¡La imagen debe estar en formato JPG o PNG!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

	}else{

	  var datosImagen = new FileReader;
	  datosImagen.readAsDataURL(imagen);

	  $(datosImagen).on("load", function(event){

	    var rutaImagen = event.target.result;

	   // $(".previsualizarImgTapa").attr("src", rutaImagen);

     $("#previsualizarImgTapa").append(`

          <div class="col-12  car px-3 rounded-0 shadow-none">

                      
                      
                  <img class="card-img-top" src="`+rutaImagen+`">
                      <div class="card-img-overlay p-0 pr-3">
                        
                         <button class="btn btn-danger btn-sm float-right shadow-sm quitarFotoNuevaTapa" >
                           
                           <i class="fas fa-times"></i>

                         </button>

                      </div>                 
                  </div>
            `)

	  })

	}

})


/*=============================================
QUITAR IMAGEN DE LA GALERÍA
=============================================*/

$(document).on("click", ".quitarFotoNuevaTapa", function(){

  var fotosNueva = $(".subirImgTapa").val();

  $(".subirImgTapa").val("");

  $(this).parent().parent().remove();
  
})




/*=============================================
Subir imagen temporalal ediatr ImgTapa
=============================================*/

$("input[name='editarImgTapa']").change(function(){

  var imagen = this.files[0];/*capturo la info del archivo imagen que se va a subir*/
  
  /*=============================================
  VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  =============================================*/

  if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

   $("input[name='editarImgTapa']").val("");

     swal.fire({
        title: "Error al subir la imagen",
        text: "¡La imagen debe estar en formato JPG o PNG!",
        type: "error",
        confirmButtonText: "¡Cerrar!"
      });

  }else{

    var datosImagen = new FileReader;
    datosImagen.readAsDataURL(imagen);

    $(datosImagen).on("load", function(event){

      var rutaImagen = event.target.result;

      $(".editarPrevisualizarImgTapa").attr("src", rutaImagen);

    })

  }

})


/*=============================================
Editar Tapa
=============================================*/

$(document).on("click", ".editarTapa", function(){

  var idTapa = $(this).attr("idTapa");

  var datos = new FormData();
  datos.append("idTapa", idTapa);

  $.ajax({

    url:"ajax/galeriaTapas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success:function(respuesta){

      	$('input[name="idTapa"]').val(respuesta["id_tapa"]);

      	$('input[name="imgTapalActual"]').val(respuesta["ruta_img_tapa"]);
        
      	$('.editarPrevisualizarImgTapa').attr("src", respuesta["ruta_img_tapa"]);      	

      	$('input[name="editarDescripcionTapa"]').val(respuesta["descripcion_tapa"]);

 
      	$('input[name="editarFechaTapa"]').val(respuesta["fecha_tapa"]);
          
    }

  })  

})


/*=============================================
Eliminar Tapa
=============================================*/

$(document).on("click", ".eliminarTapa", function(){

  var idTapa = $(this).attr("idTapa");
  var imgTapa = $(this).attr("imgTapa");

 
  swal.fire({
    title: '¿Está seguro de eliminar la tapa?',
    text: "¡Si no lo está puede cancelar la acción!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, eliminar!'
  }).then(function(result){

    if(result.value){
       
        var datos = new FormData();
        datos.append("idEliminar", idTapa);
        datos.append("imgTapa", imgTapa);

        $.ajax({

          url:"ajax/galeriaTapas.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          success:function(respuesta){

             //if(respuesta == "ok"){
               swal.fire({
                  type: "success",
                  title: "¡CORRECTO!",
                  text: "La Tapa ha sido eliminada correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                 }).then(function(result){

                    if(result.value){
                       /*history.back();*/
                      window.location = "galerias";

                    }
                })

            // }
 
          }

        })

      }

    })

})
