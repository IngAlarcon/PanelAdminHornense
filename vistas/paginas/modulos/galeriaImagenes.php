        <div class="col-12">

          <!-- Default box -->

          <div class="card card-primary card-outline">

            <!--==== Header de mi card ===== -->  
              <div class="card-header">

                <!--BOTON CREAR NUEVO IMAGEN-->   
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearImagen" >Cargar Imagen</button>

              </div>


                 <div class="card-body">


                 <table class="table table-bordered table-striped dt-responsive tablaGaleriaImagenes"  data-page-length='5' width="100%">
                  
                  <!--Cabezera de mi tabla --> 
                  <thead>

                    <tr> 

                      <!--Nombre de mis columnas --> 
                      <th style="width: 10px">#</th>
                      <th style="width: 10px">Categoría</th>
                      <th style="width: 500px">Imagen </th>                     
                      <th>Título </th>
                      <th>Epígrafe </th>
                      
                      <th>Acciones </th>

                    </tr>

                  </thead>

                  <tbody>
                    

                  </tbody> 

                </table>

           </div>

         </div>

       </div>


<!--=====================================
    Cargar Imagen a galeria
======================================-->

<div class="modal" id="crearImagen">

  <div class="modal-dialog ">

    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <div class="modal-header bg-info">

          <h4 class="modal-title">Cargar Imagen </h4>

          <button type="button" class="close" data-dismiss="modal">×</button>

        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <div class="input-group mb-3">

         <!-- Seleccionar Categoria -->

            <div class="input-group-append input-group-text">

              <i class="fas fa-list-ul" aria-hidden="true"></i>
            
            </div>

            <select class="form-control" name="selecCategoriaImg" readonly required="">

              <option value="">Elige Sección</option>

              <option value="actualidad">Actualidad</option>
              <option value="tradicion">Tradicion</option> 
              <option value="salud">Salud</option>
              <option value="mundo animal">Mundo animal</option>
              <option value="espacio musical">Espacio musical</option> 
              <option value="espacio verde">Espacio verde</option>
              <option value="espacio infantil">Espacio infantil</option>
              <option value="nosotros">Nosotros (Barrio los Hornos)</option>             
            </select>

          </div>

         <!-- Titulo de la Imagen -->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

              <i class="fas fa-pencil-alt" aria-hidden="true"></i>

            </div>

            <input type="text" class="form-control tituloImgGaleria" name="tituloImgGaleria" placeholder="Ingrese título" maxlength="60" value="" required=""> 

          </div> 
 
          <hr class="pb-2">

          <!--================================================
          =            CARGANDO IMAGEN            =
          =================================================-->

          <div class="form-group my-2 text-center">

            <div class="btn btn-default btn-file">

              <i class="fas fa-paperclip" aria-hidden="true"></i> Subir a galeria

              <input type="file" class="subirImgGaleria" name="subirImgGaleria" required="">

            </div>

            <div id="previsualizarImgGaleria"></div>

             <!-- <img class="previsualizarImgGaleria img-fluid py-2">  -->

            <p class="help-block small"> Peso Max. 5MB | Formato: JPG o PNG </p>

          </div>

          <!--====  Epigrafe de la imagen ====-->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt" aria-hidden="true"></i>
            </div>

            <input type="text" class="form-control epigrafeImgGaleria" name="epigrafeImgGaleria" placeholder="Epígrafe de la imagen" value="" maxlength="90" required=""> 

          </div> 

          <!--====  Descripocion de la imagen  ====-->
          
          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt" aria-hidden="true"></i>
            </div>

            <input type="text" class="form-control descripcionImgGaleria" name="descripcionImgGaleria" placeholder="Ingrese la descripción de la Imagen" value="" maxlength="220" required=""> 

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

             $registroGaleriaImagen = new ControladorGaleriaImagenes();
             $registroGaleriaImagen -> ctrRegistroGaleriaImagen();


        ?>


      </form>

    </div>

  </div>

</div>


<!--=====================================
    Editar Imagen de galeria
======================================-->

<div class="modal" id="editarImagen">

  <div class="modal-dialog ">

    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <div class="modal-header bg-info">

          <h4 class="modal-title">Editar imagen de galeria </h4>

          <button type="button" class="close" data-dismiss="modal">×</button>

        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <input type="hidden" class="form-control" name="idImagen"><!-- aqui se captura el id con js para llevarlo al controlador -->

          <div class="input-group mb-3">

         <!-- Seleccionar Categoria -->

            <div class="input-group-append input-group-text">

              <i class="fas fa-list-ul" aria-hidden="true"></i>
            
            </div>

            <select class="form-control" name="editarSelecCategoriaImg" readonly required="">
              
              <option class="editarCategoriaOption"></option>

              <option value="actualidad">Actualidad</option>
              <option value="tradicion">Tradicion</option> 
              <option value="salud">Salud</option>
              <option value="mundo animal">Mundo animal</option>
              <option value="espacio musical">Espacio musical</option> 
              <option value="espacio verde">Espacio verde</option>
              <option value="espacio infantil">Espacio infantil</option>
              <option value="nosotros">Nosotros (Barrio los Hornos)</option>            

            </select>

          </div>

         <!-- Titulo de la Imagen -->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

              <i class="fas fa-pencil-alt" aria-hidden="true"></i>

            </div>

            <input type="text" class="form-control editarTituloImgGaleria" name="editarTituloImgGaleria" value="" maxlength="60" required=""> 

          </div> 
 
          <hr class="pb-2">

          <!--================================================
          =            CARGANDO IMAGEN            =
          =================================================-->

          <div class="form-group my-2 text-center">

            <div class="btn btn-default btn-file">

              <i class="fas fa-paperclip" aria-hidden="true"></i> Cambiar Imagen 

              <input type="file" class="editarImgGaleria" name="editarImgGaleria">

              <input type="hidden" name="subirImgGaleriaActual">

            </div>
            
            <img class="editarPrevisualizarImgGaleria img-fluid py-2">


            <p class="help-block small"> Peso Max. 5MB | Formato: JPG o PNG </p>

          </div>

          <!--====  Epigrafe de la imagen ====-->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt" aria-hidden="true"></i>
            </div>

            <input type="text" class="form-control editarEpigrafeImgGaleria" name="editarEpigrafeImgGaleria" placeholder="Epígrafe de la imagen" value="" maxlength="90" required=""> 

          </div> 

          <!--====  Descripocion de la imagen  ====-->
          
          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt" aria-hidden="true"></i>
            </div>

            <input type="text" class="form-control editarDescripcionImgGaleria" name="editarDescripcionImgGaleria" placeholder="Ingrese la descripción de la Imagen" value="" maxlength="220" required=""> 

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

             $editarGaleriaImagen = new ControladorGaleriaImagenes();
             $editarGaleriaImagen -> ctrEditarGaleriaImagen();


        ?>

      </form>

    </div>

  </div>

</div>
