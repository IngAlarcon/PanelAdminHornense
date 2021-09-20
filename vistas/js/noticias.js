
 var ruta = "http://localhost:8080/PanelAdminHornense";
 //var ruta = "http://localhost/hornense/login";

/* Aplicando el Plugin DataTable a mi tabla con la clase */
 $(".tablaNoticias").DataTable({
 	/*Codigo para que se muestre los datos json en mi tabla sacado de la documentacion de dataTable*/

 	"ajax":"ajax/tablaNoticias.ajax.php",
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
SUMMERNOTE
=============================================*/

$(".summernote-noticia").summernote({

  toolbar:[
    
      ['style',['style']],
      ['font',['bold','italic','underline','clear']],
      ['fontname',['fontname']],
      
      
      ['para',['ul','ol','paragraph']],
     
      ['insert',['media','link','hr','picture']]
    ],

    fontNames: ['Arial', 'Arial Black'],    

     
        imageAttributes:{
            icon:'<i class="note-icon-pencil"/>',
            removeEmpty: true, // true = remove attributes | false = leave empty if present
            disableUpload: true // true = don't display Upload Options | Display Upload Options
        },

        captionIt:{
            figureClass:'{figure-class/es}',
            figcaptionClass:'{figcapture-class/es}',
            captionText:'{Default Caption Editable Placeholder Text if Title or Alt are empty}'
        },

	height: 300,

    width: 600,

    callbacks: {

		onImageUpload: function(files, editor, welEditable){ //codigo para subir imagen al server


			for(var i = 0; i < files.length; i++){

				upload_noticia(files[i], editor, welEditable);

			}
          },

			onMediaDelete : function(target){ //codigo para eliminar img del server 

 			 deleteFile(target[0].src); 

 		 } 		

	}


});

/*=============================================
SUBIR IMAGEN AL SERVIDOR
=============================================*/

function upload_noticia(file, editor, welEditable){


	var datos = new FormData();	
	datos.append('file', file, file.name);
	datos.append("ruta", ruta);
	datos.append("carpeta", "noticias");

	$.ajax({
		url: ruta+"/ajax/uploadImagen.ajax.php",
		method: "POST",
		data: datos,
		contentType: false,
		cache: false,
		processData: false,
		success: function (respuesta) {

			$('.summernote-noticia').summernote("editor.insertImage", respuesta, function ($image) {
			  $image.attr('class', 'img-fluid');
			});

		},
		error: function (jqXHR, textStatus, errorThrown) {
          console.error(textStatus + " " + errorThrown);
      }

	})

}

/*=============================================
ELIMINAR IMAGEN DEL SERVIDOR
=============================================*/


function deleteFile(src){ 

	//console.log("src",src); visualiza la ruta de src que estoy obteniendo de mi summernote

    var datos = new FormData();	
    datos.append("src", src);

	$.ajax({ 
       url: ruta+"/ajax/deleteImagen.ajax.php", 
	   method: "POST",
       data: datos,
       contentType: false,
	   cache: false,
	   processData: false, 

	    success: function(resp) { 

	     //	console.log(resp);

	     	 } 

  	}); 

  } 


/*======================================
=            Validar Titulo            =
======================================*/

$(".validarTituloNoticia").change(function(){

    $(".alert").remove();

	var noticia = $(this).val(); 

	var datos = new FormData();
	datos.append("validarTituloNoticia", noticia);

	$.ajax({

		url:"ajax/noticias.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success:function(respuesta){

			if(respuesta.length != 0){

				$(".validarTituloNoticia").parent().after('<div class="alert alert-warning">Este titulo ya existe en la base de datos</div>');

				$(".validarTituloNoticia").val("");



			}

		}
	})


})

/*=====  End of Validar Titulo  ======*/

/*=============================================
RUTA PRODUCTO
=============================================*/

function limpiarUrl(texto){
  var texto = texto.toLowerCase(); 
  texto = texto.replace(/[á]/, 'a');
  texto = texto.replace(/[é]/, 'e');
  texto = texto.replace(/[í]/, 'i');
  texto = texto.replace(/[ó]/, 'o');
  texto = texto.replace(/[ú]/, 'u');
  texto = texto.replace(/[ñ]/, 'n');
  texto = texto.replace(/[á]/, 'a');
  texto = texto.replace(/[é]/, 'e');
  texto = texto.replace(/[í]/, 'i');
  texto = texto.replace(/[ó]/, 'o');
  texto = texto.replace(/[ú]/, 'u');
  texto = texto.replace(/[ñ]/, 'n');
  texto = texto.replace(/[á]/, 'a');
  texto = texto.replace(/[é]/, 'e');
  texto = texto.replace(/[í]/, 'i');
  texto = texto.replace(/[ó]/, 'o');
  texto = texto.replace(/[ú]/, 'u');
  texto = texto.replace(/[ñ]/, 'n');
  texto = texto.replace(/[á]/, 'a');
  texto = texto.replace(/[é]/, 'e');
  texto = texto.replace(/[í]/, 'i');
  texto = texto.replace(/[ó]/, 'o');
  texto = texto.replace(/[ú]/, 'u');
  texto = texto.replace(/[ñ]/, 'n');
  texto = texto.replace(/[:]/, '');
  texto = texto.replace(/[']/, '');  
  texto = texto.replace(/[.]/, '');
  texto = texto.replace(/[?]/, '');
  texto = texto.replace(/[¿]/, '');
  texto = texto.replace(/[”]/, '');
  texto = texto.replace(/[“]/, '');
  texto = texto.replace(/[;]/, '');
  texto = texto.replace(/[=]/, '');
  texto = texto.replace(/[!]/, '');
  texto = texto.replace(/[¡]/, '');
  texto = texto.replace(/[,]/, '');
  texto = texto.replace(/[$]/, '');
  texto = texto.replace(/[-]/, '');
  texto = texto.replace(/[:]/, '');
  texto = texto.replace(/[']/, '');  
  texto = texto.replace(/[.]/, '');
  texto = texto.replace(/[?]/, '');
  texto = texto.replace(/[¿]/, '');
  texto = texto.replace(/[”]/, '');
  texto = texto.replace(/[“]/, '');
  texto = texto.replace(/[;]/, '');
  texto = texto.replace(/[=]/, '');
  texto = texto.replace(/[!]/, '');
  texto = texto.replace(/[¡]/, '');
  texto = texto.replace(/[,]/, '');
  texto = texto.replace(/[$]/, '');
  texto = texto.replace(/[-]/, '');
  texto = texto.replace(/[:]/, '');
  texto = texto.replace(/[']/, '');  
  texto = texto.replace(/[.]/, '');
  texto = texto.replace(/[?]/, '');
  texto = texto.replace(/[¿]/, '');
  texto = texto.replace(/[”]/, '');
  texto = texto.replace(/[“]/, '');
  texto = texto.replace(/[;]/, '');
  texto = texto.replace(/[=]/, '');
  texto = texto.replace(/[!]/, '');
  texto = texto.replace(/[¡]/, '');
  texto = texto.replace(/[,]/, '');
  texto = texto.replace(/[$]/, '');
  texto = texto.replace(/[-]/, '');
  texto = texto.replace(/ /g, "-")
  return texto;
}

$(".tituloNoticia").change(function(){

	$(".rutaNotica").val(limpiarUrl($(".tituloNoticia").val()));

})


/*=============================================
Subir imagen temporal Galeria 
=============================================*/

$("input[name='subirImgPortadaNoticia']").change(function(){

  var imagen = this.files[0];/*capturo la info del archivo imagen que se va a subir*/
  
  /*=============================================
	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
	=============================================*/

	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

	  $("input[name='subirImgPortadaNoticia']").val("");

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


     $("#previsualizarImgPortadaNoticia").append(`

          <div class="col-12  car px-3 rounded-0 shadow-none">

                      
                      
                  <img class="card-img-top" src="`+rutaImagen+`">
                      <div class="card-img-overlay p-0 pr-3">
                        
                         <button class="btn btn-danger btn-sm float-right shadow-sm quitarFotoNuevaNoticia" >
                           
                           <i class="fas fa-times"></i>

                         </button>

                      </div>                 
                  </div>
            `)



	   $("#ocultarVideo").hide();//me oculta el campo de video si agrego imagen de portada


	  })

	}

})

/*=============================================
QUITAR IMAGEN DE LA GALERÍA
=============================================*/

$(document).on("click", ".quitarFotoNuevaNoticia", function(){

  $('input[name="subirImgPortadaNoticia"]').val("");

  $(this).parent().parent().remove();

   $("#ocultarVideo").show();
  
})


/*=============================================
Subir imagen temporal Modal Editar
=============================================*/

$("input[name='editarSubirImgPortadaNoticia']").change(function(){

  var imagen = this.files[0];/*capturo la info del archivo imagen que se va a subir*/
  
  /*=============================================
  VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  =============================================*/

  if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

    $("input[name='editarSubirImgPortadaNoticia']").val("");

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


          $("#editarPrevisualizarImgPortadaNoticia").append(`

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
QUITAR IMAGEN DE LA GALERÍA
=============================================*/

$(document).on("click", ".quitarFotoViejaNoticia", function(){


  $('input[name="editarSubirImgPortadaNoticia"]').val("");
   $('input[name="subirPortadaNoticiaActual"]').val("");


  $(this).parent().parent().remove();

 
})



/*=============================================
AGREGAR VIDEO
=============================================*/

$(".codigoVideoPortada").change(function(){

    var codigoVideo = $(this).val();

    $(".vistaVideoPortada").html(
    
    `<iframe style='width: 674px; height: 262px; left: 0px; top: 0px;' class='note_video-clip' src="https://www.youtube.com/embed/`+codigoVideo+`" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`
  )

    $("#ocultarPortadaImagen").hide();
    $("#ocultarEpigrafeImagen").hide();
    $("#ocultarDescripcionImagen").hide();

    if(codigoVideo == ""){

    $("#ocultarPortadaImagen").show();
    $("#ocultarEpigrafeImagen").show();
    $("#ocultarDescripcionImagen").show();

     $(".vistaVideoPortada").html('<div></div>');


    }


})

/*=============================================
Ver Noticia
=============================================*/

$(document).on("click", ".verNoticias", function(){


  var idVerNoticia = $(this).attr("idVerNoticia");

  var datos = new FormData();
  datos.append("idVerNoticia", idVerNoticia);

  $.ajax({

    url:"ajax/noticias.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success:function(respuesta){


//guardando datos en variable para mostrar 
        var categoriaNoticia = respuesta["id_categoria_noticia"];
    	var volantaNoticia = respuesta["volanta"];
    	var tituloNoticia = respuesta["titulo_noticia"];
    	var bajadaNoticia = respuesta["bajada"];
    	var palabrasNoticias = respuesta["p_claves"];
    	var imagenPortada = respuesta["img_portada_ruta"];
    	var epigrafeNoticia = respuesta["epigrafe_portada"];
    	var videoPortada = respuesta["video_codigo"];
    	var contenidoNoticia = respuesta["contenido_noticia"];
    	var fechaNoticia = respuesta["fecha_noticia"];

      // Utilice el .replace función para reemplazar las letras minúsculas que comienzan una palabra con la letra mayúscula.

      categoriaNoticia = categoriaNoticia.toLowerCase().replace(/\b[a-z]/g, function(letter) { 
 
          return letter.toUpperCase(); 
 
          }); 


//incristando html en los div con los id usando los datos almacendos a mostrar 
         $("#verFechaNoticia").html('<h4 >Publicación: '+fechaNoticia+'</h4><h5>'+categoriaNoticia+'</h5>') 

         $("#verVolantaNoticia").html('<p class="font-weight-bolder">'+volantaNoticia+'</p>')


         $("#verTituloNoticia").html('<h1>'+tituloNoticia+'</h1><p>'+bajadaNoticia+'</p>') 


         if(respuesta["img_portada_ruta"] != null){


         	 $("#verPortadaNoticia").html('<img src="'+imagenPortada+'" class="img-fluid" style="width: 100%;" alt=""><figcaption>'+epigrafeNoticia+'</figcaption>')


         }else{

         	if(respuesta["video_codigo"] != null){

         		 $("#verPortadaNoticia").html('<div class="mx-3"><iframe frameborder="0" src="//www.youtube.com/embed/'+videoPortada+'" style="width: 100%; height: 362px;" class="note-video-clip"></iframe></div>')
         	}

         }


           $("#verContenidoNoticia").html('<div>'+contenidoNoticia+'</div>')

           var palabrasClavesLista = JSON.parse(respuesta["p_claves"]);//decodificando las palabras claves
        
           for(var i = 0; i < palabrasClavesLista.length; i++){

           	$(".verTags").append('<span class="badge badge-secondary mx-1">'+palabrasClavesLista[i]+'</span>');

           }
           
    }

  })  
         

})




/*=============================================
Editar Noticia
=============================================*/

$(document).on("click", ".editarNoticia", function(){

  var idNoticia = $(this).attr("idNoticia");

  var datos = new FormData();
  datos.append("idNoticia", idNoticia);

  $.ajax({

    url:"ajax/noticias.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success:function(respuesta){

      	$('input[name="idNoticia"]').val(respuesta["id_noticia"]);
      	$('.editarCategoriaOptionNoticia').val(respuesta["id_categoria_noticia"])
      	$('.editarCategoriaOptionNoticia').html(respuesta["id_categoria_noticia"]);
      	$('input[name="editarVolantaNoticia"]').val(respuesta["volanta"]);
      	$('input[name="editarTituloNoticia"]').val(respuesta["titulo_noticia"]);
      	$('input[name="editarBajadaNoticia"]').val(respuesta["bajada"]);
      	$('input[name="editarRutaNotica"]').val(respuesta["ruta_noticia"]);

      	   var palabrasClavesListaEditar = JSON.parse(respuesta["p_claves"]);//decodificando las palabras claves

      	 $(".editarPclaves").html(

					'<input type="text" class="form-control tagsInput editarPalablasClaves" value="'+palabrasClavesListaEditar+'" name="editarPalablasClaves" data-role="tagsinput" style="padding:20px">'

				)
      	 $("#editarPalabras .editarPalablasClaves").tagsinput('items');



      	 if(respuesta["img_portada_ruta"] != null){


      	 	$('input[name="subirPortadaNoticiaActual"]').val(respuesta["img_portada_ruta"]);

            $('.editarPrevisualizarImgPortadaNoticia').attr("src", respuesta["img_portada_ruta"]); 

            $('input[name="editarEpigrafePortada"]').val(respuesta["epigrafe_portada"]);
            $('input[name="editarDescripcionPortada"]').val(respuesta["descripcion_portada"]);

            // $("#ediatarOcultarVideo").hide();

               $('input[name="editarCodigoVideoPortada"]').val("");

        
                $('input[name="codigoVideoPortadaActual"]').val("");

                $(".vistaVideoPortada").html('');


         }else{

         	if(respuesta["video_codigo"] != null){

         		$('input[name="editarCodigoVideoPortada"]').val(respuesta["video_codigo"]);

        
                $('input[name="codigoVideoPortadaActual"]').val(respuesta["video_codigo"]);

                $(".vistaVideoPortada").html(`<iframe style='width: 674px; height: 262px; left: 0px; top: 0px;' class='note_video-clip' src="https://www.youtube.com/embed/`+respuesta["video_codigo"]+`" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`);




	            $('input[name="subirPortadaNoticiaActual"]').val("");

	            $('.editarPrevisualizarImgPortadaNoticia').attr("src", ""); 

	            $('input[name="editarEpigrafePortada"]').val("");
	            $('input[name="editarDescripcionPortada"]').val("");
         		 
         	}

         }



        $("#crearEditarContenidoNoticia").html('<textarea class="form-control summernote-editarNoticia " name="editarContenidoNoticia" id="editarContenidoNoticia" value="" ></textarea>')

      	$('#editarContenidoNoticia').val(respuesta["contenido_noticia"]);


 /*=============================================
SUMMERNOTE
=============================================*/

$(".summernote-editarNoticia").summernote({

  toolbar:[
    
      ['style',['style']],
      ['font',['bold','italic','underline','clear']],
      ['fontname',['fontname']],
      
      
      ['para',['ul','ol','paragraph']],
     
      ['insert',['media','link','hr','picture']]
    ],

    fontNames: ['Arial', 'Arial Black'],    

     
        imageAttributes:{
            icon:'<i class="note-icon-pencil"/>',
            removeEmpty: true, // true = remove attributes | false = leave empty if present
            disableUpload: true // true = don't display Upload Options | Display Upload Options
        },

        captionIt:{
            figureClass:'{figure-class/es}',
            figcaptionClass:'{figcapture-class/es}',
            captionText:'{Default Caption Editable Placeholder Text if Title or Alt are empty}'
        },

	height: 300,

    width: 600,

    callbacks: {

		onImageUpload: function(files, editor, welEditable){ //codigo para subir imagen al server


			for(var i = 0; i < files.length; i++){

				upload_editarNoticia(files[i], editor, welEditable);

			}
          },

			onMediaDelete : function(target){ //codigo para eliminar img del server 

 			 deleteFile(target[0].src); 

 		 } 		

	}

   });//fin del summernote

           
    }

  })  

})



$(".editarCodigoVideoPortada").change(function(){

    var codigoVideo = $(this).val();

    $(".vistaVideoPortada").html(
    
    `<iframe style='width: 674px; height: 262px; left: 0px; top: 0px;' class='note_video-clip' src="https://www.youtube.com/embed/`+codigoVideo+`" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`

  )

})        


/*=============================================
SUBIR IMAGEN AL SERVIDOR SECCION EDITAR
=============================================*/

function upload_editarNoticia(file, editor, welEditable){


	var datos = new FormData();	
	datos.append('file', file, file.name);
	datos.append("ruta", ruta);
	datos.append("carpeta", "noticias");

	$.ajax({
		url: ruta+"/ajax/uploadImagen.ajax.php",
		method: "POST",
		data: datos,
		contentType: false,
		cache: false,
		processData: false,
		success: function (respuesta) {

			$('.summernote-editarNoticia').summernote("editor.insertImage", respuesta, function ($image) {
			  $image.attr('class', 'img-fluid');
			});

		},
		error: function (jqXHR, textStatus, errorThrown) {
          console.error(textStatus + " " + errorThrown);
      }

	})

}



/*=============================================
Eliminar Nota Social
=============================================*/
$(document).on("click", ".eliminarNoticia", function(){

  var idNoticia = $(this).attr("idNoticia");
  var rutaNoticia = $(this).attr("rutaNoticia");

  //console.log("rutaNoticia", rutaNoticia);

 
  swal.fire({
    title: '¿Está seguro de eliminar la Noticia?',
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
        datos.append("idEliminar", idNoticia);
        datos.append("rutaNoticia", rutaNoticia);


        $.ajax({

          url:"ajax/noticias.ajax.php",
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
                  text: "La Noticia ah sido eliminada correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                 }).then(function(result){

                    if(result.value){
                       /*history.back();*/
                      window.location = "noticias";

                    }
                })

            // }
 
          }

        })

      }

    })

})



// boton cerrar actualiza el modal de editar social 

$(document).on("click", ".cerrarNoticia, .closeNoticia", function(){

            swal.fire({
                type:"success",
                  title: "No se realizaron cambios!",
                  showConfirmButton: true,
                confirmButtonText: "Cerrar"
                
              }).then(function(result){

                  if(result.value){

                      window.location = "noticias";   
                    /*history.back();*/
               
                 } 
         });

})
