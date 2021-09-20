
          <div class="card card-primary card-outline">

            <!--==== Header de mi card ===== -->  
              <div class="card-header">

                <!--BOTON CREAR NUEVO ARTICULO -->   
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearTapa" >Cargar Tapa</button>

              </div>




            <div class="card-body">


                 <table class="table table-bordered table-striped dt-responsive tablaGaleriaTapas"  data-page-length='5' width="100%">
                  
                  <!--Cabezera de mi tabla --> 
                  <thead>

                    <tr> 

                      <!--Nombre de mis columnas --> 
                      <th style="width: 10px">#</th>

                      <th style="width: 400px">Tapa del Diario</th>                     

                      <th >Fecha</th>

                      <th style="width: 100px">Acciones</th>

                    </tr>

                  </thead>

                  <tbody>


                  </tbody> 


                </table>

           </div>

           <!-- /.card-body -->

         </div>


    <!--=====================================
        Cargar Tapa a galeria
    ======================================-->

    <div class="modal" id="crearTapa">

      <div class="modal-dialog ">

        <div class="modal-content">

          <form method="post" enctype="multipart/form-data">


            <div class="modal-header bg-info">
              
              <h4 class="modal-title">Cargar Tapa </h4>
              <button type="button" class="close" data-dismiss="modal">×</button>

            </div>

            <!-- Modal body -->
            <div class="modal-body">

              <!--================================================
              =            CARGANDO IMAGEN            =
              =================================================-->

              <div class="form-group my-2 text-center">

                <div class="btn btn-default btn-file">

                  <i class="fas fa-paperclip" aria-hidden="true"></i> Subir Tapa

                  <input type="file" class="subirImgTapa" name="subirImgTapa" required="">

                </div>

                <!-- <img class="previsualizarImgTapa img-fluid py-2"> -->

                <div id="previsualizarImgTapa"></div>




                <p class="help-block small"> Peso recomendado Max. 2MB | Formato: JPG o PNG</p>

              </div>

              <!--====  Descripocion de la imagen de Tapa====-->
               <hr class="pb-2">

              <div class="input-group mb-3">

                <div class="input-group-append input-group-text">
                  <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                </div>

                <input type="text" class="form-control descripcionTapa" name="descripcionTapa" placeholder="Ingrese la descripción de la Imagen" value="" maxlength="220" required=""> 

              </div>           
              <!--====  End of CARGANDO IMAGEN DE PORTADA  ====-->

               <hr class="pb-2">

              <div class="input-group mb-3">

                <div class="input-group-append input-group-text">
                  <i class="fa fa-calendar-alt" aria-hidden="true"></i>
                </div>

               <input type="text" class="form-control fechaTapa"  id="fechaTapa" name="fechaTapa" placeholder="dd-mm-yyyy" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask="" required="">

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

            $registroGaleriaTapa = new ControladorGaleriaTapas();
            $registroGaleriaTapa -> ctrRegistroGaleriaTapa();


            ?>
            </div>
          </form>

        </div>

      </div>

    </div>


    <!--=====================================
        Editar Tapa de galeria
    ======================================-->

    <div class="modal" id="editarTapa">

      <div class="modal-dialog ">

        <div class="modal-content">

          <form method="post" enctype="multipart/form-data">


            <div class="modal-header bg-info">
              
              <h4 class="modal-title">Editar Tapa </h4>

              <button type="button" class="close" data-dismiss="modal">×</button>

            </div>

            <!-- Modal body -->
            <div class="modal-body">

            <input type="hidden" class="form-control" name="idTapa">

              <!--================================================
              =            EDITANDO IMAGEN            =
              =================================================-->

              <div class="form-group my-2 text-center">

                <div class="btn btn-default btn-file">

                  <i class="fas fa-paperclip" aria-hidden="true"></i> Cambiar Imagen de tapa

                  <input type="file" name="editarImgTapa">

                  <input type="hidden" name="imgTapalActual">

                </div>

                <img class="editarPrevisualizarImgTapa img-fluid py-2">

                <p class="help-block small"> Peso recomendado Max. 2MB | Formato: JPG o PNG</p>

              </div>

              <!--====  Descripocion de la imagen de Tapa====-->
               <hr class="pb-2">

              <div class="input-group mb-3">

                <div class="input-group-append input-group-text">
                  <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                </div>

                <input type="text" class="form-control editarDescripcionTapa" name="editarDescripcionTapa" value="" maxlength="220" required=""> 

              </div>           
              <!--====  End of CARGANDO IMAGEN DE PORTADA  ====-->

               <hr class="pb-2">

              <div class="input-group mb-3">

                <div class="input-group-append input-group-text">
                  <i class="fa fa-calendar-alt" aria-hidden="true"></i>
                </div>

               <input type="text" class="form-control editarFechaTapa"  id="editarFechaTapa" name="editarFechaTapa" placeholder="dd-mm-yyyy" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask="" required="">

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

            $editarGaleriaTapa = new ControladorGaleriaTapas();
            $editarGaleriaTapa -> ctrEditarGaleriaTapa();


            ?>
            </div>
          
          </form>

        </div>

      </div>

    </div>



