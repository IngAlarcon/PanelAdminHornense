/* Aplicando el Plugin DataTable a mi tabla con la clase */
 $(".tablaPublicidad").DataTable({
 	/*Codigo para que se muestre los datos json en mi tabla sacado de la documentacion de dataTable*/

 	"ajax":"ajax/tablaPublicidad.ajax.php",
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
Subir imagen temporal de Publicidad 
=============================================*/

$("input[name='subirPublicidad']").change(function(){

  var imagen = this.files[0];/*capturo la info del archivo imagen que se va a subir*/
  
    /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG PNG O GIF
    =============================================*/

    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png" && imagen["type"] != "image/gif"){

      $("input[name='subirPublicidad']").val("");

       swal.fire({
          title: "Error al subir la imagen",
          text: "¡La imagen debe estar en formato JPG, PNG o GIF!",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

    }else{

      var datosImagen = new FileReader;
      datosImagen.readAsDataURL(imagen);

      $(datosImagen).on("load", function(event){

        var rutaImagen = event.target.result;


         $("#previsualizarPublicidad").append(`

              <div class="col-12  car px-3 rounded-0 shadow-none">

                          
                          
                      <img class="card-img-top" src="`+rutaImagen+`">
                          <div class="card-img-overlay p-0 pr-3">
                            
                             <button class="btn btn-danger btn-sm float-right shadow-sm quitarFotoNuevaPublicidad" >
                               
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

$(document).on("click", ".quitarFotoNuevaPublicidad", function(){

  var fotosNueva = $(".subirPublicidad").val();

  $(".subirPublicidad").val("");

  $(this).parent().parent().remove();
  
})



/*=============================================
Subir imagen temporal Modal editar Publicidad 
=============================================*/

$("input[name='editarSubirPublicidad']").change(function(){

  var imagen = this.files[0];/*capturo la info del archivo imagen que se va a subir*/
  
    /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG PNG O GIF
    =============================================*/

    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png" && imagen["type"] != "image/gif"){

      $("input[name='editarSubirPublicidad']").val("");

       swal.fire({
          title: "Error al subir la imagen",
          text: "¡La imagen debe estar en formato JPG, PNG o GIF!",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

    }else{

      var datosImagen = new FileReader;
      datosImagen.readAsDataURL(imagen);

      $(datosImagen).on("load", function(event){

        var rutaImagen = event.target.result;

        $(".editarPrevisualizarPublicidad").attr("src", rutaImagen);

      })

    }

})

/*=============================================
Editar Publicidad
=============================================*/

$(document).on("click", ".editarPublicidad", function(){

  var idPublicidad = $(this).attr("idPublicidad");

  var datos = new FormData();
  datos.append("idPublicidad", idPublicidad);

  $.ajax({

    url:"ajax/publicidad.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success:function(respuesta){

        $('input[name="idPublicidad"]').val(respuesta["id_publicidad"]);
        
        $('.editarCategoriaOptionPubli').val(respuesta["id_categoria_publi"]);
        
        $('.editarCategoriaOptionPubli').html(respuesta["id_categoria_publi"]);

        $('.editarDisposicionOption').val(respuesta["disposicion"]);
        
        $('.editarDisposicionOption').html(respuesta["disposicion"]);   

        $('input[name="subirPublicidadActual"]').val(respuesta["ruta_img_publicidad"]);

        $('.editarPrevisualizarPublicidad').attr("src", respuesta["ruta_img_publicidad"]);        

        $('input[name="editarUrlPublicidad"]').val(respuesta["url_publicidad"]);
    }

  })  

})

/*=============================================
Eliminar Publicidad
=============================================*/

$(document).on("click", ".eliminarPublicidad", function(){

  var idPublicidad = $(this).attr("idPublicidad");
  var imgPublicidad = $(this).attr("imgPublicidad");

 
  swal.fire({
    title: '¿Está seguro de eliminar la Publicidad?',
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
        datos.append("idEliminar", idPublicidad);
        datos.append("imgPublicidad", imgPublicidad);

        $.ajax({

          url:"ajax/publicidad.ajax.php",
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
                  text: "La Publicidad ha sido eliminada correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                 }).then(function(result){

                    if(result.value){
                       /*history.back();*/
                      window.location = "publicidad";

                    }
                })

            // }
 
          }

        })

      }

    })

})














