
/* Aplicando el Plugin DataTable a mi tabla con la clase */
 $(".tablaGaleriaVideos").DataTable({
 	/*Codigo para que se muestre los datos json en mi tabla sacado de la documentacion de dataTable*/

 	"ajax":"ajax/tablaGaleriaVideos.ajax.php",
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
AGREGAR VIDEO
=============================================*/

$(".codigoVideo").change(function(){

    var codigoVideo = $(this).val();

    $(".vistaVideo").html(
    
    `<iframe width='400' height='360' class='note_video-clip' src="https://www.youtube.com/embed/`+codigoVideo+`" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`
  )

})



/*=============================================
Editar Video
=============================================*/

$(document).on("click", ".editarVideo", function(){

  var idVideo = $(this).attr("idVideo");

  var datos = new FormData();
  datos.append("idVideo", idVideo);

  $.ajax({

    url:"ajax/galeriaVideos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success:function(respuesta){

        $('input[name="idVideo"]').val(respuesta["id_video"]);

        $('.editarCategoriaOptionVideo').val(respuesta["id_categoria_video"]);
        
        $('.editarCategoriaOptionVideo').html(respuesta["id_categoria_video"]);

        $('input[name="editarTituloVideo"]').val(respuesta["titulo_video"]);

        $('input[name="editarCodigoVideo"]').val(respuesta["codigo_video"]);

        
        $('input[name="codigoVideoActual"]').val(respuesta["codigo_video"]);

         

        $(".vistaVideo").html(`<iframe width='400' height='360' class='note_video-clip' src="https://www.youtube.com/embed/`+respuesta["codigo_video"]+`" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`);


    }

  })  

})

$(".editarCodigoVideo").change(function(){

    var codigoVideo = $(this).val();

    $(".vistaVideo").html(
    
    `<iframe width='400' height='360' class='note_video-clip' src="https://www.youtube.com/embed/`+codigoVideo+`" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`
  )

})        


/*=============================================
Eliminar Video
=============================================*/

$(document).on("click", ".eliminarVideo", function(){

  var idVideo = $(this).attr("idVideo");


 
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
        datos.append("idEliminar", idVideo);

        $.ajax({

          url:"ajax/galeriaVideos.ajax.php",
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
                  text: "El video se ha eliminado correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                 }).then(function(result){

                    if(result.value){
                       /*   window.location=document.referrer;
                     history.back();*/
                      window.location = "galerias";

                    }
                })

            // }
 
          }

        })

      }

    })

})

   

