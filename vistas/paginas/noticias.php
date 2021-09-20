<?php

  if($admin["perfil"] == "Editor-Clasificados" || $admin["perfil"] == "Editor-Sociales-Newsletter" || $admin["perfil"] == "Editor-Publicidad"){

    echo '<script>

           window.location = "inicio"

         </script>';
         
       return;  
  }

?>

<div class="content-wrapper" style="min-height: 379px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Noticias</font></font></h1>

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Inicio</font></font></a></li>

              <li class="breadcrumb-item active"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Noticias</font></font></li>

            </ol>
          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>

    <!-- Main content -->

    <section class="content">

      <div class="container-fluid">

        <div class="row">

          <div class="col-12">

            <!-- Default box -->

 <!--==== PRINCIPIO DE MI CARD ===== -->  

            <div class="card card-primary card-outline">

            <!--==== Header de mi card ===== -->  
              <div class="card-header">

                <!--BOTON CREAR NUEVO ARTICULO -->   
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearNoticia" >Crear Noticia</button>

              </div>

              <!--==== Body de mi card ===== -->  

              <!--====TABLA DE LOS ADMINISTRADORES ===== -->    
              <div class="card-body">

                <table class="table table-bordered table-striped dt-responsive tablaNoticias" width="100%">
                  
                  <!--Cabezera de mi tabla --> 
                  <thead>

                    <tr> 
                      <!--Nombre de mis columnas --> 
                      <th style="width: 10px">#</th>
                      <th style="width: 10px">Sección</th>
                      <th style="width: 400px">Portada</th> <!-- acompañado con epigrafe descripcion o puede venir video-->
                      <th style="width: 30px">Volanta</th>                      
                      <th style="width: 30px">Título</th>
                      <th style="width: 30px">Bajada</th>
                      <th style="width: 30px">Palabras claves</th>                      
                      <th>Ruta</th>
                      <th >Cuerpo</th>
                      <th >Acciones</th>

                    </tr>

                  </thead>

                  <tbody>
                    

                  </tbody> 


                </table>



              </div>
              <!-- /.card-body -->

              <!--==== Footer de mi card ===== -->  
              <div class="card-footer">

              </div>

              <!-- /.card-footer-->

            </div>

            <!-- /.card -->

          </div>
        </div>
      </div>

    </section>

    <!-- /.content -->

</div>

<!--=====================================
Crear Noticia
======================================-->

<div class="modal" id="crearNoticia">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form  method="post" enctype="multipart/form-data">

        <div class="modal-header bg-info">

          <h4 class="modal-title">Crear Noticia</h4>

          <button type="button" class="close" data-dismiss="modal">×</button>

        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <div class="input-group mb-3">

         <!-- Seleccionar Categoria -->

            <div class="input-group-append input-group-text">
              <i class="fas fa-list-ul" aria-hidden="true"></i>
            </div>

            <select class="form-control" name="selecCategoriaNoticia" required="">

              <option value="">Elige Sección</option>

              <option value="actualidad">Actualidad</option>
              <option value="tradicion">Tradición</option> 
              <option value="salud">Salud</option>
              <option value="mundo animal">Mundo animal</option>
              <option value="espacio musical">Espacio musical</option> 
              <option value="espacio verde">Espacio verde</option>
              <option value="espacio infantil">Espacio infantil</option>

            </select>

          </div>

          <!-- Volanta del Articulo  -->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

              <i class="fas fa-pencil-alt" aria-hidden="true"></i>

            
            </div>

            <input type="text" class="form-control  volantaNoticia" name="volantaNoticia" placeholder="Volanta" value="" maxlength="30" required=""> 

          </div> 


         <!-- Titulo del NOTICIA -->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

              <i class="fas fa-pencil-alt" aria-hidden="true"></i>

            </div>

            <input type="text" id="campo" class="form-control validarTituloNoticia tituloNoticia" name="tituloNoticia" placeholder="Título" maxlength="80" value="" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required=""> 

          </div> 

         <!-- Descripcin del NOTICIA-->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

              <i class="fas fa-pencil-alt" aria-hidden="true"></i>

            </div>

            <input type="text" class="form-control bajadaNoticia" name="bajadaNoticia" placeholder="Bajada" value="" maxlength="230" required=""> 

          </div> 

         <!-- Ruta del NOTICIA -->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              <i class="fas fa-link" aria-hidden="true"></i>
            </div>

            <input type="text" class="form-control rutaNotica" name="rutaNotica" placeholder="Ruta de la noticia" value=""  required=""> 

          </div> 

          <!-- Palabras claves artículo -->
                  
          <div class="form-group mb-3">
     
            <label>Palabras Claves <span class="small">(Separar por comas)</span></label>

            <input type="text" class="form-control tagsInput palablasClaves" value="noticia" name="palablasClaves" data-role="tagsinput" required>

          </div> 
 
          <hr class="pb-2">

          <label>Cargar Imagen o Video de Portada </label>

          <!--================================================
          =            CARGANDO IMAGEN DE PORTADA            =
          =================================================-->

          <div class="form-group my-2 text-center" id="ocultarPortadaImagen">

            <div class="btn btn-default btn-file">

              <i class="fas fa-paperclip" aria-hidden="true"></i> Imagen de Portada

              <input type="file" class="subirImgPortadaNoticia" name="subirImgPortadaNoticia">

            </div>


              <div id="previsualizarImgPortadaNoticia"></div>

            <p class="help-block small">Dimensiones: 680px * 400px | Peso Max. 2MB | Formato: JPG o PNG</p>

          </div>

          <!--====  Epigrafe  ====-->

          <div class="col-10 input-group px-5 mb-3" id="ocultarEpigrafeImagen" >

            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt" aria-hidden="true"></i>
            </div>

            <input type="text"   style="width:300px"  class="form-control epigrafePortada" name="epigrafePortada" placeholder="Epígrafe de portada" value="" maxlength="90" > 

          </div> 

          <!--====  Descripocion de la imagen de portada  ====-->
          
          <div class="col-10 input-group px-5 mb-3" id="ocultarDescripcionImagen">

            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt" aria-hidden="true"></i>
            </div>

            <input type="text" class="form-control descripcionPortada" name="descripcionPortada" placeholder="Ingrese la descripción de la Imagen" value="" maxlength="220" > 

          </div>           
          <!--====  End of CARGANDO IMAGEN DE PORTADA  ====-->

          <hr class="pb-2">


           <!--==== Cargando ruta del video (codigo)====-->          

            <div class="input-group my-4 mb-3" id="ocultarVideo">

                 <h5 class="mx-5">Video</h5>

                  <div class="vistaVideoPortada mx-5 "> </div>
              
                  <div class="input-group mx-5"> 


                    <div class="input-group-prepend ">

                      <span class="p-2 bg-secondary rounded-left ">youtube.com/embed/</span>
                    
                    </div>
      
                    <input type="text" class="form-control codigoVideoPortada" name="codigoVideoPortada" placeholder="Agregue el código del vídeo">

                   <p>Código después del signo igual https://www.youtube.com/watch?v = <b>1itSqkbXIlU</b> </p>
                  
                  </div>

            </div>

        <!--==========================================
         =     SECCION DE CONTENIDO DE LA NOTICIA   =
         ===========================================-->
        <p>Cuerpo de la noticia:</p>

          <div class="container">

            <div class="row">

              <div class="form-group col-sm-8 mx-5 ">

                <textarea class="form-control summernote-noticia " name="contenidoNoticia" id="contenidoNoticia" value="" placeholder="Ingrese contenido de la noticia...."></textarea>

              </div>       
                   
          <!--====  End of SECCION AGREGAR SEGUNDA IMGEN Y VIDEO  ====-->
           </div>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer d-flex justify-content-between">

          <div>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>

          <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>

        </div>

        </div>

        <?php
          
          $registroNoticia = new ControladorNoticias();

          $registroNoticia -> ctrRegistroNoticia();

        
          ?>


   
      </form>

    </div>

  </div>

</div>




<!--=====================================
Ver Noticia
======================================-->

<div class="modal" id="verNoticias">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <!-- Div de titulo-->
      <div class="modal-header bg-info" id="verFechaNoticia">



      </div>


      <!-- Modal body -->
      <div class="modal-body">

        <div id="verVolantaNoticia"> </div>

        <hr class="pb-2">

        <!-- Div de ver imagen -->

        <div id="verTituloNoticia">


        </div>

        <div id="verPortadaNoticia">


        </div>

        <hr class="pb-2">

        <div id="verContenidoNoticia"> </div>

        <div id="verPalabras" ><p class="verTags" >Palabras claves:</p> </div>


        <!-- Modal footer -->
        <div class="modal-footer d-flex justify-content-between">

          <div>

            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>

<!--=====================================
Editar Noticia
======================================-->

<div class="modal" data-backdrop="false"  id="editarNoticia">

  <div class="modal-dialog  modal-lg">

    <div class="modal-content">

      <form  method="post" enctype="multipart/form-data">

        <div class="modal-header bg-info">

          <h4 class="modal-title">Editar Noticia</h4>

          <button type="button" class="close closeNoticia" data-dismiss="modal">×</button>

        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <input type="hidden" class="form-control" name="idNoticia">

          <div class="input-group mb-3">

         <!-- Seleccionar Categoria -->

            <div class="input-group-append input-group-text">
              <i class="fas fa-list-ul" aria-hidden="true"></i>
            </div>

            <select class="form-control" name="editarSelecCategoriaNoticia" required="">

              <option class="editarCategoriaOptionNoticia"></option>

              <option value="actualidad">Actualidad</option>
              <option value="tradicion">Tradición</option> 
              <option value="salud">Salud</option>
              <option value="mundo animal">Mundo animal</option>
              <option value="espacio musical">Espacio musical</option> 
              <option value="espacio verde">Espacio verde</option>
              <option value="espacio infantil">Espacio infantil</option>

            </select>

          </div>

          <!-- Volanta del Articulo  -->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

              <i class="fas fa-pencil-alt" aria-hidden="true"></i>

              

            </div>

            <input type="text" class="form-control  editarVolantaNoticia" name="editarVolantaNoticia" placeholder="Volanta del noticia" maxlength="30" value="" required=""> 

          </div> 


         <!-- Titulo del NOTICIA -->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

              <i class="fas fa-pencil-alt" aria-hidden="true"></i>

            </div>

            <input type="text" class="form-control editarTituloNoticia" name="editarTituloNoticia"  value="" readonly> 

          </div> 

         <!-- Descripcin del NOTICIA-->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

              <i class="fas fa-pencil-alt" aria-hidden="true"></i>

            </div>

            <input type="text" class="form-control editarBajadaNoticia" name="editarBajadaNoticia" placeholder="Bajada del noticia" value="" maxlength="230" required=""> 

          </div> 

         <!-- Ruta del NOTICIA -->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              <i class="fas fa-link" aria-hidden="true"></i>
            </div>

            <input type="text" class="form-control editarRutaNotica" name="editarRutaNotica" placeholder="Ruta de la Notica" value=""  readonly> 

          </div> 

          <!-- Palabras claves artículo -->
                  
          <div id="editarPalabras" class="form-group mb-3 editarPclaves">
     
            <label>Palabras Claves <span class="small">(Separar por comas)</span></label>

          </div> 
 
          <hr class="pb-2">

          <label>Cargar Imagen o Video de Portada </label>

          <!--================================================
          =            CARGANDO IMAGEN DE PORTADA            =
          =================================================-->

          <div class="form-group my-2 text-center" id="editarOcultarPortadaImagen">

            <div class="btn btn-default btn-file">

              <i class="fas fa-paperclip" aria-hidden="true"></i> Imagen de Portada

              <input type="file" class="editarSubirImgPortadaNoticia" name="editarSubirImgPortadaNoticia">
              <input type="hidden" name="subirPortadaNoticiaActual">

            </div>


          <div id="editarPrevisualizarImgPortadaNoticia"></div>  


             <div class="col-12  car px-3 rounded-0 shadow-none">

                   <img class="editarPrevisualizarImgPortadaNoticia img-fluid py-2" >    
              
                      <div class="card-img-overlay p-0 pr-3">
                        
                         <button class="btn btn-danger btn-sm float-right shadow-sm quitarFotoViejaNoticia" >
                           
                           <i class="fas fa-times"></i>

                         </button>

                      </div>                 
                  </div>


            <p class="help-block small">Dimensiones: 680px * 400px | Peso Max. 2MB | Formato: JPG o PNG</p>

          </div>

          <!--====  Epigrafe  ====-->

          <div class="col-10 input-group px-5 mb-3" id="editarOcultarEpigrafeImagen" >

            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt" aria-hidden="true"></i>
            </div>

            <input type="text"   style="width:300px"  class="form-control editarEpigrafePortada" name="editarEpigrafePortada" placeholder="Epígrafe de portada" value="" maxlength="90" > 

          </div> 

          <!--====  Descripocion de la imagen de portada  ====-->
          
          <div class="col-10 input-group px-5 mb-3" id="editarOcultarDescripcionImagen">

            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt" aria-hidden="true"></i>
            </div>

            <input type="text" class="form-control editarDescripcionPortada" name="editarDescripcionPortada" placeholder="Ingrese la descripción de la Imagen" value="" maxlength="220" > 

          </div>           
          <!--====  End of CARGANDO IMAGEN DE PORTADA  ====-->

          <hr class="pb-2">


           <!--==== Cargando ruta del video (codigo)====-->          

            <div class="input-group my-4 mb-3" id="ediatarOcultarVideo">

                 <h5 class="mx-5">Video</h5>

                  <div class="vistaVideoPortada mx-5 "> </div>
              
                  <div class="input-group mx-5"> 


                    <div class="input-group-prepend ">

                      <span class="p-2 bg-secondary rounded-left ">youtube.com/embed/</span>
                    
                    </div>
      
                    <input type="text" class="form-control editarCodigoVideoPortada" name="editarCodigoVideoPortada" placeholder="Agregue el código del vídeo">

                    <input type="hidden" name="codigoVideoPortadaActual">

                   <p>Código después del signo igual https://www.youtube.com/watch?v = <b>1itSqkbXIlU</b> </p>
                  
                  </div>

            </div>

        <!--==========================================
         =     SECCION DE CONTENIDO DE LA NOTICIA   =
         ===========================================-->
        <p>Cuerpo de la noticia:</p>

          <div class="container">

            <div class="row">

              <div class="form-group col-sm-8 mx-5" id="crearEditarContenidoNoticia">


              </div>       
                   
          <!--====  End of SECCION AGREGAR SEGUNDA IMGEN Y VIDEO  ====-->
           </div>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer d-flex justify-content-between">

          <div>
            <button type="button" class="btn btn-danger cerrarNoticia" data-dismiss="modal">Cerrar</button>
          </div>

          <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>

        </div>

        </div>

        <?php
          
          $editarNoticia = new ControladorNoticias();

          $editarNoticia -> ctrEditarNoticia();

        
          ?>


      </form>

    </div>

  </div>

</div>



                      
                    