/* Aplicando el Plugin DataTable a mi tabla con la clase */
 $(".tablaGaleriaImagenes").DataTable({
 	/*Codigo para que se muestre los datos json en mi tabla sacado de la documentacion de dataTable*/

 	"ajax":"ajax/tablaGaleriaImagenes.ajax.php",
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
Subir imagen temporal Galeria 
=============================================*/

$("input[name='subirImgGaleria']").change(function(){

  var imagen = this.files[0];/*capturo la info del archivo imagen que se va a subir*/
  
  /*=============================================
	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
	=============================================*/

	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

	  $("input[name='subirImgGaleria']").val("");

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

	    // $(".previsualizarImgGaleria").attr("src", rutaImagen);

      $("#previsualizarImgGaleria").append(`

          <div class="col-12  car px-3 rounded-0 shadow-none">

                      
                      
                  <img class="card-img-top" src="`+rutaImagen+`">
                      <div class="card-img-overlay p-0 pr-3">
                        
                         <button class="btn btn-danger btn-sm float-right shadow-sm quitarFotoNuevaImagen">
                           
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

$(document).on("click", ".quitarFotoNuevaImagen", function(){

  var fotosNueva = $(".subirImgGaleria").val();

  $(".subirImgGaleria").val("");

  $(this).parent().parent().remove();
  
})



/*=============================================
Subir imagen temporalal ediatr ImgTapa
=============================================*/

$("input[name='editarImgGaleria']").change(function(){

  var imagen = this.files[0];/*capturo la info del archivo imagen que se va a subir*/
  
  /*=============================================
  VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  =============================================*/

  if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

   $("input[name='editarImgGaleria']").val("");

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

      $(".editarPrevisualizarImgGaleria").attr("src", rutaImagen);

    })

  }

})


/*=============================================
Editar Imagen de Galeria
=============================================*/

$(document).on("click", ".editarImagen", function(){

  var idImagen = $(this).attr("idImagen");

  var datos = new FormData();
  datos.append("idImagen", idImagen);

  $.ajax({

    url:"ajax/galeriaImagenes.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success:function(respuesta){
         
      	$('input[name="idImagen"]').val(respuesta["id_imagen"]);
        
        $('.editarCategoriaOption').val(respuesta["id_categoria_img"]);
        
        $('.editarCategoriaOption').html(respuesta["id_categoria_img"]);  

        $('input[name="editarTituloImgGaleria"]').val(respuesta["titulo_imagen"]);     	

      	$('input[name="subirImgGaleriaActual"]').val(respuesta["ruta_imagen"]);

      	$('.editarPrevisualizarImgGaleria').attr("src", respuesta["ruta_imagen"]);

    

     	 $('input[name="editarEpigrafeImgGaleria"]').val(respuesta["epigrafe_imagen"]);

 
       $('input[name="editarDescripcionImgGaleria"]').val(respuesta["descripcion_img_galeria"]);
          
    }

  })  

})



/*=============================================
Eliminar Imagen de Galeria
=============================================*/

$(document).on("click", ".eliminarImagen", function(){

  var idImagen = $(this).attr("idImagen");
  var imgImagen = $(this).attr("imgImagen");

 
  swal.fire({
    title: '¿Está seguro de eliminar la Imagen?',
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
        datos.append("idEliminar", idImagen);
        datos.append("imgImagen", imgImagen);

        $.ajax({

          url:"ajax/galeriaImagenes.ajax.php",
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
                  text: "La Imagen ha sido eliminada correctamente",
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







