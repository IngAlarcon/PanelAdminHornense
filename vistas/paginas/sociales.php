<?php

  if($admin["perfil"] == "Editor-Publicidad" || $admin["perfil"] == "Editor-Clasificados"){

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

          <h1><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sociales</font></font></h1>

        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Inicio</font></font></a></li>

            <li class="breadcrumb-item active"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sociales</font></font></li>

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


          <div class="card card-primary card-outline">

            <div class="card-header">

              <!--BOTON CREAR NUEVO ARTICULO -->   
              <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#publicarSociales" >Crear álbum</button>

            </div>

            <div class="card-body">

              <table class="table table-bordered table-striped dt-responsive tablaSociales" width="100%">

              <!--#### Cabezera de mi tabla #####--> 
                <thead>

                  <tr> 

                    <!--Nombre de mis columnas --> 
                    <th style="width: 10px">#</th>

                    <th style="width: 400px">Imagen </th>    

                    <th style="width: 150px">Título </th>

                    <th>Contenido del álbum</th>

                    <th>Fecha</th>  

                    <th>Acciones </th>

                  </tr>

                </thead>

                 <!--#### Cuerpo de mi tabla #####-->

                <tbody>


               </tbody> 

             </table>


           </div>


           <!-- /.card-body -->



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
Modal Crear Nota Sociales
======================================-->

<div class="modal " id="publicarSociales">

  <div class="modal-dialog">

    <div class="modal-content">

      <form  method="post" enctype="multipart/form-data">

        <div class="modal-header bg-info">
          <h4 class="modal-title">Crear álbum </h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
 
        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <!-- Titulo de la Imagen -->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

              <i class="fas fa-pencil-alt" aria-hidden="true"></i>

            </div>

            <input type="text" class="form-control" name="tituloSocial" placeholder="Ingrese título" maxlength="60" value="" required=""> 

          </div> 

          <hr class="pb-2">

      <!--================================================
      =            CARGANDO IMAGEN        =
      =================================================-->

      <div class="form-group my-2 text-center">

        <div class="btn btn-default btn-file">

          <i class="fas fa-paperclip" aria-hidden="true"></i> Subir imagen 1

          <input type="file" class="subirImgSocial" name="subirImgSocial" required="">

        </div>

        <!-- <img class="previsualizarImgSocial img-fluid py-2"> -->

        <div id="previsualizarImgSocial"></div>

        <p class="help-block small"> Peso recomendable Max. 5MB | Formato: JPG o PNG</p>

      </div>

      <!--====  Epigrafe de la imagen ====-->

        <div class="input-group mb-3">

          <div class="input-group-append input-group-text">
            <i class="fas fa-pencil-alt" aria-hidden="true"></i>
          </div>

          <input type="text" class="form-control epigrafeImgSocial" name="epigrafeImgSocial" placeholder="Epígrafe de la imagen" value="" maxlength="90" required=""> 

        </div> 

      <!--====  Descripocion de la imagen  ====-->

      <div class="input-group mb-3">

        <div class="input-group-append input-group-text">

          <i class="fas fa-pencil-alt" aria-hidden="true"></i>

        </div>

        <input type="text" class="form-control descripcionImgSocial" name="descripcionImgSocial" placeholder="Ingrese la descripción de la Imagen" value="" maxlength="220" required=""> 

      </div>           
      <!--====  End of CARGANDO Descripocion de la imagen  ====-->


       <hr class="pb-2">

      <!--================================================
      =            CARGANDO IMAGEN 2       =
      =================================================-->

      <div class="form-group my-2 text-center">

        <div class="btn btn-default btn-file">

          <i class="fas fa-paperclip" aria-hidden="true"></i> Subir imagen 2

          <input type="file" class="subirImgSocialdos" name="subirImgSocialdos">

        </div>



        <div id="previsualizarImgSocialdos"></div>

        <p class="help-block small">Peso recomendable Max. 5MB | Formato: JPG o PNG</p>

      </div>


     <!--====  Epigrafe de la imagen dos====-->

        <div class="input-group mb-3">

          <div class="input-group-append input-group-text">
            <i class="fas fa-pencil-alt" aria-hidden="true"></i>
          </div>

          <input type="text" class="form-control epigrafeImgSocialdos" name="epigrafeImgSocialdos" placeholder="Epígrafe de la imagen" value="" maxlength="90" > 

        </div> 

      <!--====  Descripocion de la imagen dos ====-->

      <div class="input-group mb-3">

        <div class="input-group-append input-group-text">

          <i class="fas fa-pencil-alt" aria-hidden="true"></i>

        </div>

        <input type="text" class="form-control descripcionImgSocialdos" name="descripcionImgSocialdos" placeholder="Ingrese la descripción de la Imagen" value="" maxlength="220" > 

      </div>       

      <hr class="pb-2">

      <!--================================================
      =            CARGANDO IMAGEN 3     =
      =================================================-->

      <div class="form-group my-2 text-center">

        <div class="btn btn-default btn-file">

          <i class="fas fa-paperclip" aria-hidden="true"></i> Subir imagen 3

          <input type="file" class="subirImgSocialdostres" name="subirImgSocialtres">

        </div>

  <!--       <img class="previsualizarImgSocialtres img-fluid py-2">
 -->
        <div id="previsualizarImgSocialtres"></div>

        <p class="help-block small">Peso recomendable Max. 5MB | Formato: JPG o PNG</p>

      </div>

      <!--====  Epigrafe de la imagen tres ====-->

        <div class="input-group mb-3">

          <div class="input-group-append input-group-text">
            <i class="fas fa-pencil-alt" aria-hidden="true"></i>
          </div>

          <input type="text" class="form-control epigrafeImgSocialtres" name="epigrafeImgSocialtres" placeholder="Epígrafe de la imagen" value="" maxlength="90" > 

        </div> 

      <!--====  Descripocion de la imagen  ====-->

      <div class="input-group mb-3">

        <div class="input-group-append input-group-text">

          <i class="fas fa-pencil-alt" aria-hidden="true"></i>

        </div>

        <input type="text" class="form-control descripcionImgSocialtres" name="descripcionImgSocialtres" placeholder="Ingrese la descripción de la Imagen" value="" maxlength="220" > 

      </div>       


      <hr class="pb-2">

      <!--================================================
      =            CARGANDO IMAGEN 4    =
      =================================================-->

      <div class="form-group my-2 text-center">

        <div class="btn btn-default btn-file">

          <i class="fas fa-paperclip" aria-hidden="true"></i> Subir imagen 4

          <input type="file" class="subirImgSocialdoscuatro" name="subirImgSocialcuatro">

        </div>

 <!--        <img class="previsualizarImgSocialcuatro img-fluid py-2"> -->

        <div id="previsualizarImgSocialcuatro"></div>

        <p class="help-block small">Peso recomendable Max. 5MB | Formato: JPG o PNG</p>

      </div>

     <!--====  Epigrafe de la imagen cuatro ====-->

        <div class="input-group mb-3">

          <div class="input-group-append input-group-text">
            <i class="fas fa-pencil-alt" aria-hidden="true"></i>
          </div>

          <input type="text" class="form-control epigrafeImgSocialcuatro" name="epigrafeImgSocialcuatro" placeholder="Epígrafe de la imagen" value="" maxlength="90" > 

        </div> 

      <!--====  Descripocion de la imagen cuatro ====-->

      <div class="input-group mb-3">

        <div class="input-group-append input-group-text">

          <i class="fas fa-pencil-alt" aria-hidden="true"></i>

        </div>

        <input type="text" class="form-control descripcionImgSocialcuatro" name="descripcionImgSocialcuatro" placeholder="Ingrese la descripción de la Imagen" value="" maxlength="220"> 

      </div>       

      <hr class="pb-2">

        <!--==========================================
        =     SECCION DE CONTENIDO DE LA NOTA =
        ===========================================-->
        <p>Escriba contenido de la imagen</p>

        <div class="container">

          <div class="col-12">

<textarea  maxlength="500" class="form-control summernote-sociales " name="contenidoSocial" id="contenidoSocial" style="width: 100%"  placeholder="Ingrese contenido...." ></textarea>

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

        <?php
          
          $registroSocial = new ControladorSociales();

          $registroSocial -> ctrRegistroSocial();

        ?>
       
       </div>

     </form>

  </div>

 </div>

</div>



<!--=====================================
Ver Nota Sociales
======================================-->

<div class="modal" id="verSociales">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <!-- Div de titulo-->
      <div class="modal-header bg-info" id="verTituloSocial">

        <button type="button" class="close" data-dismiss="modal">×</button>

      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <div id="verFechaSocial"> </div>

        <hr class="pb-2">

        <!-- Div de ver imagen -->

        <div id="verImgSocial">


        </div>
        <div id="verAltSocial"> </div>

        <hr class="pb-2">

        <div id="verContenidoSocial"> </div>


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
Editar Sociales
======================================-->

<div class="modal"  data-backdrop="false" id="editarSocial">

  <div class="modal-dialog ">

    <div class="modal-content">

      <form  method="post" enctype="multipart/form-data">

        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Editar álbum </h4>

          <button type="button" class="close closeSocial" data-dismiss="modal">×</button>

        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <input type="hidden" class="form-control" name="idSocial">

          <!-- Titulo de la Imagen -->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

              <i class="fas fa-pencil-alt" aria-hidden="true"></i>

            </div>

            <input type="text" class="form-control" name="editarTituloSocial" maxlength="60" required> 

          </div> 

          <hr class="pb-2">

          <!--================================================
          =            EDITAR IMAGEN                     =
          =================================================-->

          <div class="form-group my-2 text-center">

            <div class="btn btn-default btn-file">

              <i class="fas fa-paperclip" aria-hidden="true"></i> Cambiar Imagen 1

              <input type="file" name="editarImgSocial">

              <input type="hidden" name="imgSocialActual">

            </div>

            <img class="editarPrevisualizarImgSocial img-fluid py-2">

            <p class="help-block small">Peso recomendable Max. 5MB | Formato: JPG o PNG</p>

          </div>

        <!--====  Epigrafe de la imagen ====-->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt" aria-hidden="true"></i>
            </div>

            <input type="text" class="form-control editarEpigrafeImgSocial" name="editarEpigrafeImgSocial" placeholder="Epígrafe de la imagen" value="" maxlength="90" required=""> 

          </div> 


          <!--====  Descripocion de la imagen de portada  ====-->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

              <i class="fas fa-pencil-alt" aria-hidden="true"></i>

            </div>

            <input type="text" class="form-control editarDescripcionImgSocial" name="editarDescripcionImgSocial" placeholder="Ingrese la descripción de la Imagen" value="" maxlength="220" required=""> 

          </div>

          <hr class="pb-2">


          <!--================================================
          =            EDITAR IMAGEN DOS                   =
          =================================================-->

          <div class="form-group my-2 text-center">

            <div class="btn btn-default btn-file">

              <i class="fas fa-paperclip" aria-hidden="true"></i> Cambiar Imagen 2

              <input type="file" name="editarImgSocialdos">

              <input type="hidden" name="imgSocialActualdos">

            </div>

            <img class="editarPrevisualizarImgSocialdos img-fluid py-2">

            <p class="help-block small">Peso recomendable Max. 5MB | Formato: JPG o PNG</p>

          </div>

        <!--====  Epigrafe de la imagen ====-->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt" aria-hidden="true"></i>
            </div>

            <input type="text" class="form-control editarEpigrafeImgSocialdos" name="editarEpigrafeImgSocialdos" placeholder="Epígrafe de la imagen" value="" maxlength="90"> 

          </div> 


          <!--====  Descripocion de la imagen de portada  ====-->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

              <i class="fas fa-pencil-alt" aria-hidden="true"></i>

            </div>

            <input type="text" class="form-control editarDescripcionImgSocialdos" name="editarDescripcionImgSocialdos" placeholder="Ingrese la descripción de la Imagen" value="" maxlength="220"> 

          </div>


          <hr class="pb-2">

          <!--================================================
          =            EDITAR IMAGEN TRES                 =
          =================================================-->

          <div class="form-group my-2 text-center">

            <div class="btn btn-default btn-file">

              <i class="fas fa-paperclip" aria-hidden="true"></i> Cambiar Imagen 3

              <input type="file" name="editarImgSocialtres">

              <input type="hidden" name="imgSocialActualtres">

            </div>

            <img class="editarPrevisualizarImgSocialtres img-fluid py-2">

            <p class="help-block small">Peso recomendable Max. 5MB | Formato: JPG o PNG</p>

          </div>

          <!--====  Epigrafe de la imagen ====-->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt" aria-hidden="true"></i>
            </div>

            <input type="text" class="form-control editarEpigrafeImgSocialtres" name="editarEpigrafeImgSocialtres" placeholder="Epígrafe de la imagen" value="" maxlength="90"> 

          </div> 


          <!--====  Descripocion de la imagen de portada  ====-->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

              <i class="fas fa-pencil-alt" aria-hidden="true"></i>

            </div>

            <input type="text" class="form-control editarDescripcionImgSocialtres" name="editarDescripcionImgSocialtres" placeholder="Ingrese la descripción de la Imagen" value="" maxlength="220"> 

          </div>

           <hr class="pb-2">

          <!--================================================
          =            EDITAR IMAGEN CUATRO                 =
          =================================================-->

          <div class="form-group my-2 text-center">

            <div class="btn btn-default btn-file">

              <i class="fas fa-paperclip" aria-hidden="true"></i> Cambiar Imagen 4

              <input type="file" name="editarImgSocialcuatro">

              <input type="hidden" name="imgSocialActualcuatro">

            </div>

            <img class="editarPrevisualizarImgSocialcuatro img-fluid py-2">

            <p class="help-block small">Peso recomendable Max. 5MB | Formato: JPG o PNG</p>

          </div> 

        <!--====  Epigrafe de la imagen ====-->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt" aria-hidden="true"></i>
            </div>

            <input type="text" class="form-control editarEpigrafeImgSocialcuatro" name="editarEpigrafeImgSocialcuatro" placeholder="Epígrafe de la imagen" value="" maxlength="90"> 

          </div> 


          <!--====  Descripocion de la imagen de portada  ====-->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

              <i class="fas fa-pencil-alt" aria-hidden="true"></i>

            </div>

            <input type="text" class="form-control editarDescripcionImgSocialcuatro" name="editarDescripcionImgSocialcuatro" placeholder="Ingrese la descripción de la Imagen" value="" maxlength="220"> 

          </div>                  

          <hr class="pb-2">
          <!--==========================================
          =     SECCION DE CONTENIDO            =
          ===========================================-->
          <p>Escriba contenido de la imagen</p>

          <div class="container">

            <div class="col-12" id="crearEditarContenidoSocial">

            </div>

          </div>

          <!--====  End of SECCION DE CONTENIDO  ====-->

         <!-- Modal footer -->

          <div class="modal-footer d-flex justify-content-between">

            <div>

              <button type="button" class="btn btn-danger cerrarSociales" data-dismiss="modal">Cerrar</button>

            </div>

            <div>

              <button type="submit" class="btn btn-primary">Guardar</button>

            </div>

          </div>

          <?php

          $editarSocial = new ControladorSociales();

          $editarSocial -> ctrEditarSocial();

          ?>
      
         </div>
      
       </form>

     </div>

    </div>

 </div>

