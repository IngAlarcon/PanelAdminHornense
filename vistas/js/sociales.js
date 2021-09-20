/* Aplicando el Plugin DataTable a mi tabla con la clase */
 $(".tablaSociales").DataTable({
 	/*Codigo para que se muestre los datos json en mi tabla sacado de la documentacion de dataTable*/

 	"ajax":"ajax/tablaSociales.ajax.php",
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
Subir imagen temporal ImgSocial
=============================================*/

$("input[name='subirImgSocial']").change(function(){

  var imagen = this.files[0];/*capturo la info del archivo imagen que se va a subir*/
  
  	/*=============================================
	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
	=============================================*/

	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

	  $("input[name='subirImgSocial']").val("");

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

	    // $(".previsualizarImgSocial").attr("src", rutaImagen);

       $("#previsualizarImgSocial").append(`

            <div class="col-12  car px-3 rounded-0 shadow-none">

                        
                        
                    <img class="card-img-top" src="`+rutaImagen+`">
                        <div class="card-img-overlay p-0 pr-3">
                          
                           <button class="btn btn-danger btn-sm float-right shadow-sm quitarFotoNuevaSocial" >
                             
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

$(document).on("click", ".quitarFotoNuevaSocial", function(){

  var fotosNueva = $(".subirImgSocial").val();

  $('input[name="subirImgSocial"]').val("");
 
  $(this).parent().parent().remove();
  
})



/*=============================================
Subir imagen temporal ImgSocial Modal Editar
=============================================*/

$("input[name='editarImgSocial']").change(function(){

  var imagen = this.files[0];/*capturo la info del archivo imagen que se va a subir*/
  
    /*=============================================
  VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  =============================================*/

  if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

    $("input[name='editarImgSocial']").val("");

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

       $(".editarPrevisualizarImgSocial").attr("src", rutaImagen);

    })

  }

})


/*=============================================
Subir imagen temporal ImgSocial 2
=============================================*/

$("input[name='subirImgSocialdos']").change(function(){

  var imagen2 = this.files[0];/*capturo la info del archivo imagen que se va a subir*/
  
  	/*=============================================
	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
	=============================================*/

	if(imagen2["type"] != "image/jpeg" && imagen2["type"] != "image/png"){

	  $("input[name='subirImgSocialdos']").val("");

	   swal.fire({
	      title: "Error al subir la imagen",
	      text: "¡La imagen debe estar en formato JPG o PNG!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

	}else{

	  var datosImagen2 = new FileReader;
	  datosImagen2.readAsDataURL(imagen2);

	  $(datosImagen2).on("load", function(event){

	    var rutaImagen2 = event.target.result;

	    // $(".previsualizarImgSocialdos").attr("src", rutaImagen2);

       $("#previsualizarImgSocialdos").append(`

            <div class="col-12  car px-3 rounded-0 shadow-none">

                        
                        
                    <img class="card-img-top" src="`+rutaImagen2+`">
                        <div class="card-img-overlay p-0 pr-3">
                          
                           <button class="btn btn-danger btn-sm float-right shadow-sm quitarFotoNuevaSocialdos" >
                             
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

$(document).on("click", ".quitarFotoNuevaSocialdos", function(){

  var fotosNueva = $(".subirImgSocialdos").val();

  $('input[name="subirImgSocialdos"]').val("");

  $(this).parent().parent().remove();
  
})



/*=============================================
Subir imagen temporal ImgSocial 2
=============================================*/

$("input[name='editarImgSocialdos']").change(function(){

  var imagen2 = this.files[0];/*capturo la info del archivo imagen que se va a subir*/
  
    /*=============================================
  VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  =============================================*/

  if(imagen2["type"] != "image/jpeg" && imagen2["type"] != "image/png"){

    $("iinput[name='editarImgSocialdos']").val("");

     swal.fire({
        title: "Error al subir la imagen",
        text: "¡La imagen debe estar en formato JPG o PNG!",
        type: "error",
        confirmButtonText: "¡Cerrar!"
      });

  }else{

    var datosImagen2 = new FileReader;
    datosImagen2.readAsDataURL(imagen2);

    $(datosImagen2).on("load", function(event){

      var rutaImagen2 = event.target.result;

      $(".editarPrevisualizarImgSocialdos").attr("src", rutaImagen2);

    })

  }

})



/*=============================================
Subir imagen temporal ImgSocial 3
=============================================*/

$("input[name='subirImgSocialtres']").change(function(){

  var imagen3 = this.files[0];/*capturo la info del archivo imagen que se va a subir*/
  
  	/*=============================================
	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
	=============================================*/

	if(imagen3["type"] != "image/jpeg" && imagen3["type"] != "image/png"){

	  $("input[name='subirImgSocialtres']").val("");

	   swal.fire({
	      title: "Error al subir la imagen",
	      text: "¡La imagen debe estar en formato JPG o PNG!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

	}else{

	  var datosImagen3 = new FileReader;
	  datosImagen3.readAsDataURL(imagen3);

	  $(datosImagen3).on("load", function(event){

	    var rutaImagen3 = event.target.result;

       $("#previsualizarImgSocialtres").append(`

            <div class="col-12  car px-3 rounded-0 shadow-none">

                        
                        
                    <img class="card-img-top" src="`+rutaImagen3+`">
                        <div class="card-img-overlay p-0 pr-3">
                          
                           <button class="btn btn-danger btn-sm float-right shadow-sm quitarFotoNuevaSocial3" >
                             
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

$(document).on("click", ".quitarFotoNuevaSocial3", function(){

  var fotosNueva = $(".subirImgSocialtres").val();

  $('input[name="subirImgSocialtres"]').val("");

  $(this).parent().parent().remove();
  
})

/*=============================================
Subir imagen temporal ImgSocial 3
=============================================*/

$("input[name='editarImgSocialtres']").change(function(){

  var imagen3 = this.files[0];/*capturo la info del archivo imagen que se va a subir*/
  
    /*=============================================
  VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  =============================================*/

  if(imagen3["type"] != "image/jpeg" && imagen3["type"] != "image/png"){

    $("input[name='editarImgSocialtres']").val("");

     swal.fire({
        title: "Error al subir la imagen",
        text: "¡La imagen debe estar en formato JPG o PNG!",
        type: "error",
        confirmButtonText: "¡Cerrar!"
      });

  }else{

    var datosImagen3 = new FileReader;
    datosImagen3.readAsDataURL(imagen3);

    $(datosImagen3).on("load", function(event){

      var rutaImagen3 = event.target.result;

      $(".editarPrevisualizarImgSocialtres").attr("src", rutaImagen3);

    })

  }

})

/*=============================================
Subir imagen temporal ImgSocial 4
=============================================*/

$("input[name='subirImgSocialcuatro']").change(function(){

  var imagen4 = this.files[0];/*capturo la info del archivo imagen que se va a subir*/
  
  	/*=============================================
	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
	=============================================*/

	if(imagen4["type"] != "image/jpeg" && imagen4["type"] != "image/png"){

	  $("input[name='subirImgSocialcuatro']").val("");

	   swal.fire({
	      title: "Error al subir la imagen",
	      text: "¡La imagen debe estar en formato JPG o PNG!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

	}else{

	  var datosImagen4 = new FileReader;
	  datosImagen4.readAsDataURL(imagen4);

	  $(datosImagen4).on("load", function(event){

	    var rutaImagen4 = event.target.result;

       $("#previsualizarImgSocialcuatro").append(`

            <div class="col-12  car px-3 rounded-0 shadow-none">

                        
                        
                    <img class="card-img-top" src="`+rutaImagen4+`">
                        <div class="card-img-overlay p-0 pr-3">
                          
                           <button class="btn btn-danger btn-sm float-right shadow-sm quitarFotoNuevaSocialcuatro" >
                             
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

$(document).on("click", ".quitarFotoNuevaSocialcuatro", function(){

  var fotosNueva = $(".subirImgSocialcuatro").val();

  $('input[name="subirImgSocialcuatro"]').val("");

  $(this).parent().parent().remove();
  
})


/*=============================================
Subir imagen temporal ImgSocial 4
=============================================*/

$("input[name='editarImgSocialcuatro']").change(function(){

  var imagen4 = this.files[0];/*capturo la info del archivo imagen que se va a subir*/
  
  /*=============================================
  VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  =============================================*/

  if(imagen4["type"] != "image/jpeg" && imagen4["type"] != "image/png"){

    $("input[name='editarImgSocialcuatro']").val("");

     swal.fire({
        title: "Error al subir la imagen",
        text: "¡La imagen debe estar en formato JPG o PNG!",
        type: "error",
        confirmButtonText: "¡Cerrar!"
      });

  }else{

    var datosImagen4 = new FileReader;
    datosImagen4.readAsDataURL(imagen4);

    $(datosImagen4).on("load", function(event){

      var rutaImagen4 = event.target.result;

      $(".editarPrevisualizarImgSocialcuatro").attr("src", rutaImagen4);

    })

  }

})



/*=============================================
SUMMERNOTE
=============================================*/

$(".summernote-sociales").summernote({

  toolbar:[
    
      ['font',['bold','italic','underline','clear']],
      ['fontname',['fontname']],
     
      ['insert',['media','link']]

    ],

    fontNames: ['Arial', 'Arial Black'],

    disableDragAndDrop: true,


     height: 200,

});




/*=============================================
Editar Social
=============================================*/

$(document).on("click", ".editarSocial", function(){

  var idSocial = $(this).attr("idSocial");

  var datos = new FormData();
  datos.append("idSocial", idSocial);

  $.ajax({

    url:"ajax/sociales.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success:function(respuesta){

      	$('input[name="idSocial"]').val(respuesta["id_social"]);
      	$('input[name="editarTituloSocial"]').val(respuesta["titulo_social"]);

      	$('input[name="imgSocialActual"]').val(respuesta["imagen_social_ruta"]);
      	$('.editarPrevisualizarImgSocial').attr("src", respuesta["imagen_social_ruta"]);
      	
      	$('input[name="editarEpigrafeImgSocial"]').val(respuesta["epigrafe_social_uno"]);
        $('input[name="editarDescripcionImgSocial"]').val(respuesta["descripcion_img_social"]);

      	$('input[name="imgSocialActualdos"]').val(respuesta["imagen_social_rutados"]);
      	$('.editarPrevisualizarImgSocialdos').attr("src", respuesta["imagen_social_rutados"]);

        $('input[name="editarEpigrafeImgSocialdos"]').val(respuesta["epigrafe_social_dos"]);
        $('input[name="editarDescripcionImgSocialdos"]').val(respuesta["descripcion_img_social_dos"]);        

      	$('input[name="imgSocialActualtres"]').val(respuesta["imagen_social_rutatres"]);
      	$('.editarPrevisualizarImgSocialtres').attr("src", respuesta["imagen_social_rutatres"]);

        $('input[name="editarEpigrafeImgSocialtres"]').val(respuesta["epigrafe_social_tres"]);
        $('input[name="editarDescripcionImgSocialtres"]').val(respuesta["descripcion_img_social_tres"]);        

      	$('input[name="imgSocialActualcuatro"]').val(respuesta["imagen_social_rutacuatro"]);
      	$('.editarPrevisualizarImgSocialcuatro').attr("src", respuesta["imagen_social_rutacuatro"]);

        $('input[name="editarEpigrafeImgSocialcuatro"]').val(respuesta["epigrafe_social_cuatro"]);
        $('input[name="editarDescripcionImgSocialcuatro"]').val(respuesta["descripcion_img_social_cuatro"]);

        $("#crearEditarContenidoSocial").html('<textarea class="form-control summernote-sociales-editar" name="editarContenidoSocial" id="editarContenidoSocial" maxlength="500" style="width: 100%"></textarea>')

      	$('#editarContenidoSocial').val(respuesta["contenido_social"]);

/*=============================================
SUMMERNOTE
=============================================*/

$(".summernote-sociales-editar").summernote({

  toolbar:[
    
      ['font',['bold','italic','underline','clear']],
      ['fontname',['fontname']],
     
      ['insert',['media','link']]

    ],

    fontNames: ['Arial', 'Arial Black'],

    disableDragAndDrop: true,


     height: 200,

});
           
    }

  })  

})


/*=============================================
Ver Social
=============================================*/

$(document).on("click", ".verSociales", function(){

  var idVerSocial = $(this).attr("idVerSocial");

  var datos = new FormData();
  datos.append("idVerSocial", idVerSocial);

  $.ajax({

    url:"ajax/sociales.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success:function(respuesta){

//guardando datos en variable para mostrar 

    	var titulosocial = respuesta["titulo_social"];
      var rutaimagen = respuesta["imagen_social_ruta"];
      var epigrafe = respuesta["epigrafe_social_uno"];
      var descripcion = respuesta["descripcion_img_social"];
    	var vercontenidosocial = respuesta["contenido_social"];
    	
    	var rutaimagendos = respuesta["imagen_social_rutados"];
      var epigrafedos = respuesta["epigrafe_social_dos"];
      var descripciondos = respuesta["descripcion_img_social_dos"];      
    	var rutaimagentres = respuesta["imagen_social_rutatres"];
      var epigrafetres = respuesta["epigrafe_social_tres"];
      var descripciontres = respuesta["descripcion_img_social_tres"];      
    	var rutaimagencuatro = respuesta["imagen_social_rutacuatro"];
      var epigrafecuatro = respuesta["epigrafe_social_cuatro"];
      var descripcioncuatro = respuesta["descripcion_img_social_cuatro"];
    	var verfechasocial = respuesta["fecha_social"];

//incristando html en los div con los id usando los datos almacendos a mostrar 
         $("#verTituloSocial").html('<h4 class="modal-title">'+titulosocial+'</h4>') 

         $("#verFechaSocial").html('<p class="font-weight-bolder">Fecha publicación: '+verfechasocial.substr(0, 11)+'</p>')


         if(respuesta["imagen_social_ruta"] != null && respuesta["imagen_social_rutados"] != null && respuesta["imagen_social_rutatres"] != null && respuesta["imagen_social_rutacuatro"] != null){

      
            $("#verImgSocial").html('<div class="card"><div class="card-body"><div id="carouselcuatro" class="carousel slide" data-ride="carousel"><ol class="carousel-indicators"><li data-target="#carouselcuatro" data-slide-to="0" class="active"></li><li data-target="#carouselcuatro" data-slide-to="1" class=""></li><li data-target="#carouselcuatro" data-slide-to="2" class=""></li><li data-target="#carouselcuatro" data-slide-to="3" class=""></li></ol><div class="carousel-inner"><div class="carousel-item active"><img class="d-block w-100" src="'+rutaimagen+'" alt="First slide"><div class="py-2"><figcaption>Epigrafe: '+epigrafe+'</figcaption><figcaption>Descripcion: '+descripcion+'</figcaption></div></div><div class="carousel-item"><img class="d-block w-100" src="'+rutaimagendos+'" alt="Second slide"><div class="py-2"><figcaption>Epigrafe: '+epigrafedos+'</figcaption><figcaption>Descripcion: '+descripciondos+'</figcaption></div></div><div class="carousel-item"><img class="d-block w-100" src="'+rutaimagentres+'" alt="Third slide"><div class="py-2"><figcaption>Epigrafe: '+epigrafetres+'</figcaption><figcaption>Descripcion: '+descripciontres+'</figcaption></div></div><div class="carousel-item"><img class="d-block w-100" src="'+rutaimagencuatro+'" alt="Third slide"><div class="py-2"><figcaption>Epígrafe: '+epigrafecuatro+'</figcaption><figcaption>Descripción: '+descripcioncuatro+'</figcaption></div></div></div><a class="carousel-control-prev" href="#carouselcuatro" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carouselcuatro" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a></div></div></div>')


         }else{
      
               if (respuesta["imagen_social_ruta"] != null && respuesta["imagen_social_rutados"] != null && respuesta["imagen_social_rutatres"] != null) {


        $("#verImgSocial").html('<div class="card"><div class="card-body"><div id="carouseltres" class="carousel slide" data-ride="carousel"><ol class="carousel-indicators"><li data-target="#carouseltres" data-slide-to="0" class="active"></li><li data-target="#carouseltres" data-slide-to="1" class=""></li><li data-target="#carouseltres" data-slide-to="2" class=""></li></ol><div class="carousel-inner"><div class="carousel-item active"><img class="d-block w-100" src="'+rutaimagen+'" alt="First slide"><div class="py-2"><figcaption>Epigrafe: '+epigrafe+'</figcaption><figcaption>Descripcion: '+descripcion+'</figcaption></div></div><div class="carousel-item"><img class="d-block w-100" src="'+rutaimagendos+'"><div class="py-2"><figcaption>Epigrafe: '+epigrafedos+'</figcaption><figcaption>Descripcion: '+descripciondos+'</figcaption></div></div><div class="carousel-item"><img class="d-block w-100" src="'+rutaimagentres+'" alt="Third slide"><div class="py-2"><figcaption>Epígrafe: '+epigrafetres+'</figcaption><figcaption>Descripción: '+descripciontres+'</figcaption></div></div></div><a class="carousel-control-prev" href="#carouseltres" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carouseltres" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a></div></div></div>')



               }else{

               	if ( respuesta["imagen_social_ruta"] != null && respuesta["imagen_social_rutados"] != null) {

	           $("#verImgSocial").html('<div class="card"><div class="card-body"><div id="carouseldos" class="carousel slide" data-ride="carousel"><ol class="carousel-indicators"><li data-target="#carouseldos" data-slide-to="0" class="active"></li><li data-target="#carouseldos" data-slide-to="1" class=""></li></ol><div class="carousel-inner"><div class="carousel-item active"><img class="d-block w-100" src="'+rutaimagen+'"><div class="py-2"><figcaption>Epigrafe: '+epigrafe+'</figcaption><figcaption>Descripcion: '+descripcion+'</figcaption></div></div><div class="carousel-item"><img class="d-block w-100" src="'+rutaimagendos+'" alt="Second slide"><div class="py-2"><figcaption>Epígrafe: '+epigrafedos+'</figcaption><figcaption>Descripción: '+descripciondos+'</figcaption></div></div></div><a class="carousel-control-prev" href="#carouseldos" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carouseldos" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a></div></div></div>')
               	


               	}else{
                       
                    $("#verImgSocial").html('<img src="'+rutaimagen+'" class="img-fluid py-2"><div class="py-2"><figcaption>Epígrafe: '+epigrafe+'</figcaption><figcaption>Descripción: '+descripcion+'</figcaption></div>')   
               	}

               } 

            }


         $("#verContenidoSocial").html('<p>'+vercontenidosocial+'</p>') 

           
    }

  })  

})


/*=============================================
Eliminar Nota Social
=============================================*/

$(document).on("click", ".eliminarSocial", function(){

  var idSocial = $(this).attr("idSocial");
  var imgSocial = $(this).attr("imgSocial");
  var imgSocialdos = $(this).attr("imgSocialdos");
  var imgSocialtres = $(this).attr("imgSocialtres");
  var imgSocialcuatro = $(this).attr("imgSocialcuatro");
 
  swal.fire({
    title: '¿Está seguro de eliminar la Nota Social?',
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
        datos.append("idEliminar", idSocial);
        datos.append("imgSocial", imgSocial);
        datos.append("imgSocialdos", imgSocialdos);
        datos.append("imgSocialtres", imgSocialtres);
        datos.append("imgSocialcuatro", imgSocialcuatro);

        $.ajax({

          url:"ajax/sociales.ajax.php",
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
                  text: "La Nota ha sido borrado correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                 }).then(function(result){

                    if(result.value){
                       /*history.back();*/
                      window.location = "sociales";

                    }
                })

            // }
 
          }

        })

      }

    })

})

// boton cerrar actualiza el modal de editar social 

$(document).on("click", ".cerrarSociales, .closeSocial", function(){

            swal.fire({
                type:"success",
                  title: "No se realizaron cambios!",
                  showConfirmButton: true,
                confirmButtonText: "Cerrar"
                
              }).then(function(result){

                  if(result.value){

                      window.location = "sociales";   
                    /*history.back();*/
                  
                    } 
              });

})
