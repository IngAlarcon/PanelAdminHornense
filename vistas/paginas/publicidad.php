<?php

  if($admin["perfil"] == "Editor-Clasificados" || $admin["perfil"] == "Editor-Sociales-Newsletter" || $admin["perfil"] == "Editor-Noticias-Sociales-Galerias"){

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

            <h1><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Publicidad</font></font></h1>

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Inicio</font></font></a></li>

              <li class="breadcrumb-item active"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Publicidad</font></font></li>

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
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearPublicidad" >Cargar Publicidad</button>

              </div>

              <!--==== Body de mi card ===== -->  

              <!--====TABLA DE LOS ADMINISTRADORES ===== -->    
              <div class="card-body">

                <table class="table table-bordered table-striped dt-responsive tablaPublicidad" width="100%">
                  
                  <!--Cabezera de mi tabla --> 
                  <thead>

                    <tr> 

                      <!--Nombre de mis columnas --> 
                      <th style="width: 10px">#</th>
                      <th style="width: 10px">Categoría</th>
                      <th style="width: 500px">Publicidad </th>                     
                      <th th style="width: 30px">Disposición </th>
                      <th style="width: 100px">Url de Publicidad</th>
                      <th>Fecha</th>                      
                      <th>Acciones </th>

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
Crear Publicidad
======================================-->

<div class="modal" id="crearPublicidad">

  <div class="modal-dialog ">

    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <div class="modal-header bg-info">

          <h4 class="modal-title">Cargar Publicidad</h4>

          <button type="button" class="close" data-dismiss="modal">×</button>

        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <div class="input-group mb-3">

         <!-- Seleccionar Categoria -->

            <div class="input-group-append input-group-text">
              <i class="fas fa-list-ul" aria-hidden="true"></i>
            </div>

            <select class="form-control" name="selecCategoriaPulicidad">

              <option value="">Elige Sección</option>
              <option value="inicio">Inicio</option>
              <option value="actualidad">Actualidad</option>
              <option value="tradicion">Tradición</option> 
              <option value="salud">Salud</option>
              <option value="mundo animal">Mundo animal</option>
              <option value="espacio musical">Espacio musical</option> 
              <option value="espacio verde">Espacio verde</option>
              <option value="espacio infantil">Espacio infantil</option>
              <option value="hornense">Publicidad Hornense</option>      



            </select>


          </div>


       <div class="input-group mb-3">

         <!-- Seleccionar Categoria -->

            <div class="input-group-append input-group-text">
              <i class="fas fa-list-ul" aria-hidden="true"></i>
            </div>

            <select class="form-control" name="disposicionPublicidad">

              <option value="">Disposición</option>

              <option value="cuadrada(295x205)">Publicidad hornense(295x205)</option>
              <option value="horizontal(700x200)">Horizontal(700x200)</option>
              <option value="vertical(230x270)">Vertical(230x270)</option>


            </select>
 
          
          </div>


 
          <hr class="pb-2">

          <!--================================================
          =            CARGANDO IMAGEN DE PORTADA            =
          =================================================-->

          <div class="form-group my-2 text-center">

            <div class="btn btn-default btn-file">

              <i class="fas fa-paperclip" aria-hidden="true"></i> Publicidad

              <input type="file" class="subirPublicidad" name="subirPublicidad" required="">

            </div>

            <div id="previsualizarPublicidad"></div>

            <p class="help-block small">Peso Max. 2MB | Formato: JPG, PNG o GIF</p>

          </div>
        
          <!--====  End of CARGANDO IMAGEN DE PORTADA  ====-->
          


          <hr class="pb-2">


          <label>Url de la Publicidad: Ejemplo: https://www.hornense.com</label>

          
          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

              <i class="fas fa-pencil-alt" aria-hidden="true"></i>

            </div>
             
            <input type="text" class="form-control " name="urlPublicidad" placeholder="EJEMPLO: https://www.hornense.com" value="" required=""> 

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

             $registroPublicidad = new ControladorPublicidad();
             $registroPublicidad -> ctrRegistroPublicidad();
        ?>

      </form>

    </div>

  </div>

</div>


<!--=====================================
 Editar Publicidad
======================================-->

<div class="modal" id="editarPublicidad">

  <div class="modal-dialog ">

    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <div class="modal-header bg-info">

          <h4 class="modal-title">Editar publicidad</h4>

          <button type="button" class="close" data-dismiss="modal">×</button>

        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <input type="hidden" class="form-control" name="idPublicidad"><!-- aqui se captura el id con js para llevarlo al controlador -->

          <div class="input-group mb-3">

         <!-- Seleccionar Categoria -->

            <div class="input-group-append input-group-text">
              <i class="fas fa-list-ul" aria-hidden="true"></i>
            </div>

            <select class="form-control" name="editarSelecCategoriaPulicidad" readonly>

              <option class="editarCategoriaOptionPubli"></option>
              <option value="inicio">Inicio</option>
              <option value="actualidad">Actualidad</option>
              <option value="tradicion">Tradicion</option> 
              <option value="salud">Salud</option>
              <option value="mundo animal">Mundo animal</option>
              <option value="espacio musical">Espacio musical</option> 
              <option value="espacio verde">Espacio verde</option>
              <option value="espacio infantil">Espacio infantil</option>
              <option value="hornense">Publicidad Hornense</option>      

            </select>

          </div>

       <div class="input-group mb-3">

         <!-- Seleccionar Categoria -->

            <div class="input-group-append input-group-text">
              <i class="fas fa-list-ul" aria-hidden="true"></i>
            </div>

            <select class="form-control" name="editarDisposicionPublicidad" readonly>

              <option class="editarDisposicionOption"></option>

              <option value="cuadrada(295x205)">Publicidad hornense(295x205)</option>
              <option value="horizontal(700x200)">Horizontal(700x200)</option>
              <option value="vertical(230x270)">Vertical(230x270)</option>


            </select>
 
          
          </div>


 
          <hr class="pb-2">

          <!--================================================
          =            CARGANDO IMAGEN DE Publicidad       =
          =================================================-->

          <div class="form-group my-2 text-center">

            <div class="btn btn-default btn-file">

              <i class="fas fa-paperclip" aria-hidden="true"></i> Cambiar Publicidad

              <input type="file" class="editarSubirPublicidad" name="editarSubirPublicidad" >

              <input type="hidden" name="subirPublicidadActual">

            </div>

            <img class="editarPrevisualizarPublicidad img-fluid py-2">

            <p class="help-block small">Peso Max. 2MB | Formato: JPG, PNG o GIF</p>

          </div>
        
          <!--====  End of CARGANDO IMAGEN DE PORTADA  ====-->
          


          <hr class="pb-2">


          <!-- Descripcin del articulo-->
          <label>Url de la Publicidad: EJEMPLO:https://www.hornense.com</label>
          
          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

              <i class="fas fa-pencil-alt" aria-hidden="true"></i>

            </div>
             
            <input type="text" class="form-control " name="editarUrlPublicidad" placeholder="EJEMPLO: https://www.hornense.com" value="" required=""> 

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

             $editarPublicidad = new ControladorPublicidad();
             $editarPublicidad -> ctrEditarPublicidad();

        ?>

      </form>

    </div>

  </div>

</div>
