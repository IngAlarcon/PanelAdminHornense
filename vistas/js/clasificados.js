/* Aplicando el Plugin DataTable a mi tabla con la clase */
 $(".tablaClasificados").DataTable({
 	/*Codigo para que se muestre los datos json en mi tabla sacado de la documentacion de dataTable*/

 	"ajax":"ajax/tablaClasificados.ajax.php",
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

$("input[name='subirClasificado']").change(function(){

  var imagen = this.files[0];/*capturo la info del archivo imagen que se va a subir*/
  
    /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    =============================================*/

    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

      $("input[name='subirClasificado']").val("");

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

        // $(".previsualizarClasificado").attr("src", rutaImagen);

         $("#previsualizarClasificado").append(`

              <div class="col-12  car px-3 rounded-0 shadow-none">
                                              
                     <img class="card-img-top" src="`+rutaImagen+`">
                          <div class="card-img-overlay p-0 pr-3">
                            
                             <button class="btn btn-danger btn-sm float-right shadow-sm quitarFotoNuevaClasificado" >
                               
                               <i class="fas fa-times"></i>

                             </button>

                          </div>                 
                      </div>
                `)


      })

    }

})

/*=============================================
QUITAR IMAGEN 
=============================================*/

$(document).on("click", ".quitarFotoNuevaClasificado", function(){

  var fotosNueva = $(".subirClasificado").val();

  $(".subirClasificado").val("");

  $(this).parent().parent().remove();
  
})



/*=============================================
Subir imagen temporal Modal Editar CLasificado
=============================================*/

$("input[name='editarSubirClasificado']").change(function(){

  var imagen = this.files[0];/*capturo la info del archivo imagen que se va a subir*/
  
    /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    =============================================*/

    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

      $("input[name='editarSubirClasificado']").val("");

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

        $("#editarPrevisualizarClasificado").append(`

          <div class="col-12  car px-3 rounded-0 shadow-none">

                      
                      
                  <img class="card-img-top" src="`+rutaImagen+`">
                      <div class="card-img-overlay p-0 pr-3">
                        
                         <button class="btn btn-danger btn-sm float-right shadow-sm quitarFotoViejaClasificado" >
                           
                           <i class="fas fa-times"></i>

                         </button>

                      </div>                 
                  </div>
            `)

      })

    }

})




/*=============================================
Editar CLasifiacado
=============================================*/

$(document).on("click", ".editarClasificado", function(){

  var idClasificado = $(this).attr("idClasificado");

  var datos = new FormData();
  datos.append("idClasificado", idClasificado);

  $.ajax({

    url:"ajax/clasificados.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success:function(respuesta){

        $('input[name="idClasificado"]').val(respuesta["id_clasificado"]);
        
        $('.editarCategoriaOptionClasificado').val(respuesta["id_categoria_clasificado"]);
        
        $('.editarCategoriaOptionClasificado').html(respuesta["id_categoria_clasificado"]);

        $('input[name="editarCaracteristicaClasificado"]').val(respuesta["caracteristica"]);

        $('.editarOperacionOption').val(respuesta["operacion"]);
        
        $('.editarOperacionOption').html(respuesta["operacion"]);

        $('.editarDiaOption').val(respuesta["dia"]);
        
        $('.editarDiaOption').html(respuesta["dia"]);


       $('input[name="editarFechaClasificado"]').val(respuesta["fecha_publicacion"]);

        $('textarea[name="editarDetallesClasificado"]').val(respuesta["detalles_clasificado"]);

         

        $('input[name="subirClasificadoActual"]').val(respuesta["ruta_img_clasificado"]);

        $('.editarPrevisualizarClasificado').attr("src", respuesta["ruta_img_clasificado"]);        

        $('input[name="editarUrlClasificado"]').val(respuesta["url_clasificado"]);
    }

  })  

})

/*=============================================
QUITAR IMAGEN DE LA GALERÍA
=============================================*/

$(document).on("click", ".quitarFotoViejaClasificado", function(){


  $('input[name="editarSubirClasificado"]').val("");
   $('input[name="subirClasificadoActual"]').val("");


  $(this).parent().parent().remove();
  
})



/*=============================================
Eliminar Clasificado
=============================================*/

$(document).on("click", ".eliminarClasificado", function(){

  var idClasificado = $(this).attr("idClasificado");
  var imgClasificado = $(this).attr("imgClasificado");

 
  swal.fire({
    title: '¿Está seguro de eliminar el Clasificado?',
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
        datos.append("idEliminar", idClasificado);
        datos.append("imgClasificado", imgClasificado);

        $.ajax({

          url:"ajax/clasificados.ajax.php",
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
                  text: "El Clasificado se ha eliminado correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                 }).then(function(result){

                    if(result.value){

                      window.location = "clasificados";

                    }
                })

            // }
 
          }

        })

      }

    })

})



