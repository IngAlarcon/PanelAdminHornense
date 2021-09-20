        <div class="col-12">

          <!-- Default box -->

          <div class="card card-primary card-outline">

            <!--==== Header de mi card ===== -->  
              <div class="card-header">

                <!--BOTON CREAR NUEVO ARTICULO -->   
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearVideo" >Cargar Video</button>

              </div>




            <div class="card-body">


                 <table class="table table-bordered table-striped dt-responsive tablaGaleriaVideos"  data-page-length='5' width="100%">
                  
                  <!--Cabezera de mi tabla --> 
                  <thead>

                    <tr> 

                      <!--Nombre de mis columnas --> 
                      <th style="width: 10px">#</th>
                      <th style="width: 10px">Categoría</th>
                      <th>Título </th>
                      <th style="width: 500px">Video </th>  
                    
                      <th>Acciones </th>

                    </tr>

                  </thead>

                  <tbody>
                    

                  </tbody> 


                </table>

           </div>

           <!-- /.card-body -->

         </div>

         <!-- /.card -->
       </div>


 <!--=====================================
    Cargar Video a galeria
======================================-->

<div class="modal" id="crearVideo">

  <div class="modal-dialog ">

    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <div class="modal-header bg-info">

          <h4 class="modal-title">Cargar Video </h4>
          
          <button type="button" class="close" data-dismiss="modal">×</button>
        
        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <div class="input-group mb-3">

         <!-- Seleccionar Categoria -->

            <div class="input-group-append input-group-text">

              <i class="fas fa-list-ul" aria-hidden="true"></i>
            
            </div>

            <select class="form-control selecCategoriaVideo" name="selecCategoriaVideo" readonly required="">

              <option value="">Elige Sección</option>

              <option value="actualidad">Actualidad</option>
              <option value="tradicion">Tradicion</option> 
              <option value="salud">Salud</option>
              <option value="mundo animal">Mundo animal</option>
              <option value="espacio musical">Espacio musical</option> 
              <option value="espacio verde">Espacio verde</option>
              <option value="espacio infantil">Espacio infantil</option>          

            </select>

          </div>

         <!-- Titulo del video -->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

              <i class="fas fa-pencil-alt" aria-hidden="true"></i>

            </div>

            <input type="text" class="form-control tituloVideo" name="tituloVideo" placeholder="Título del video" value="" maxlength="60" required=""> 

          </div> 

          <hr class="pb-2">

          <!--==== Cargando ruta del video (codigo)====-->          

            <div class="input-group my-4 mb-3">

                 <h5>Video</h5>
              
                  <div class="input-group mx-5"> 

                    <div class="vistaVideo"> </div>


                    <div class="input-group-prepend">

                      <span class="p-2 bg-secondary rounded-left ">youtube.com/embed/</span>
                    
                    </div>
      
                    <input type="text" class="form-control codigoVideo" name="codigoVideo" placeholder="Agregue el código del vídeo">

 
                   <p>Código esta después del igual https://www.youtube.com/watch?v = <b>p2vtMu_-4Rs</b> </p>
                  
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

             $registroGaleriaVideo = new ControladorGaleriaVideos();
             $registroGaleriaVideo -> ctrRegistroGaleriaVideo();


        ?>        
         </div>
      </form>

    </div>

  </div>

</div>




 <!--=====================================
    Editar Video de galeria
======================================-->

<div class="modal" id="editarVideo">

  <div class="modal-dialog ">

    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <div class="modal-header bg-info">

          <h4 class="modal-title">Editar Video de la galeria </h4>
          
          <button type="button" class="close" data-dismiss="modal">×</button>
        
        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <input type="hidden" class="form-control" name="idVideo"><!-- aqui se captura el id con js para llevarlo al controlador -->

          <div class="input-group mb-3">

         <!-- Seleccionar Categoria -->

            <div class="input-group-append input-group-text">

              <i class="fas fa-list-ul" aria-hidden="true"></i>
            
            </div>

            <select class="form-control selecCategoriaVideo" name="editarSelecCategoriaVideo" readonly required="">

              <option class="editarCategoriaOptionVideo"></option>

              <option value="actualidad">Actualidad</option>
              <option value="tradicion">Tradicion</option> 
              <option value="salud">Salud</option>
              <option value="mundo animal">Mundo animal</option>
              <option value="espacio musical">Espacio musical</option> 
              <option value="espacio verde">Espacio verde</option>
              <option value="espacio infantil">Espacio infantil</option>          

            </select>

          </div>

         <!-- Titulo del video -->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

              <i class="fas fa-pencil-alt" aria-hidden="true"></i>

            </div>

            <input type="text" class="form-control editarTituloVideo" name="editarTituloVideo" placeholder="Título del video" maxlength="60" value="" required=""> 

          </div> 


 
          <hr class="pb-2">
          
          <!--==== Cargando ruta del video (codigo)====-->          

            <div class="input-group my-4 mb-3">

                 <h5>Video</h5>
              
                  <div class="input-group mx-5"> 

                    <div class="vistaVideo"> </div>


                    <div class="input-group-prepend">

                      <span class="p-2 bg-secondary rounded-left ">youtube.com/embed/</span>
                    
                    </div>
      
                    <input type="text" class="form-control editarCodigoVideo" name="editarCodigoVideo" placeholder="Agregue el código del vídeo">

                    <input type="hidden" name="codigoVideoActual">

                   <p>Código esta después del igual https://www.youtube.com/watch?v = <b>p2vtMu_-4Rs</b> </p>
                  
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

             $editarGaleriaVideo = new ControladorGaleriaVideos();
             $editarGaleriaVideo -> ctrEditarGaleriaVideo();


        ?>        
         </div>
      </form>

    </div>

  </div>

</div>