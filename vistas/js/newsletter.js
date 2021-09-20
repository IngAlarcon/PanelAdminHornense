/* Aplicando el Plugin DataTable a mi tabla con la clase */
 $(".tablaNewsletter").DataTable({
 	/*Codigo para que se muestre los datos json en mi tabla sacado de la documentacion de dataTable*/

 	"ajax":"ajax/tablaNewsletter.ajax.php",
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