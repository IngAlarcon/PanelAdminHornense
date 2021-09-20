<?php

  if($admin["perfil"] == "Editor-Publicidad" || $admin["perfil"] == "Editor-Sociales-Newsletter" || $admin["perfil"] == "Editor-Noticias-Sociales-Galerias"){

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

          <h1><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Clasificados</font></font></h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Inicio</font></font></a></li>

            <li class="breadcrumb-item active"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Clasificados</font></font></li>

          </ol>

        </div>

      </div>

    </div>

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
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearClasificado" >Cargar Clasificado</button>

              </div>

              <!--==== Body de mi card ===== -->  

              <!--====TABLA DE LOS ADMINISTRADORES ===== -->    
              <div class="card-body">

                <table class="table table-bordered table-striped dt-responsive tablaClasificados" width="100%">
                  
                  <!--Cabezera de mi tabla --> 
                  <thead>

                    <tr> 

                      <!--Nombre de mis columnas --> 
                      <th style="width: 10px">#</th>
                      <th style="width: 10px">Categoría</th>
                      <th style="width: 500px">Imagen</th>                     
                      <th>Característica</th>
                      <th>Operación</th>
                      <th>Detalles</th>
                      <th>Fecha</th>                      
                      <th>Acciones</th>

                    </tr>

                  </thead>

                  <tbody>
                    

                  </tbody> 

                </table>

              </div>

              <!--==== Footer de mi card ===== -->  
              <div class="card-footer">


              </div>

            </div>

          </div>
        </div>
      </div>

    </section>

    <!-- /.content -->

</div>


<!--=====================================
Crear Publicidad
======================================-->

<div class="modal" id="crearClasificado">

  <div class="modal-dialog ">

    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <div class="modal-header bg-info">

          <h4 class="modal-title">Subir Clasificado</h4>

          <button type="button" class="close" data-dismiss="modal">×</button>

        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <div class="input-group mb-3">

         <!-- Seleccionar Categoria -->

            <div class="input-group-append input-group-text">
              <i class="fas fa-list-ul" aria-hidden="true"></i>
            </div>

            <select class="form-control" name="selecCategoriaClasificado">

              <option value="">Elige Categoria</option>
              <option value="inmuebles">Inmuebles</option>
              <option value="empleos">Empleos</option>
              <option value="transporte y fletes">Transporte y fletes</option> 
              <option value="salud">Salud</option>
              <option value="automotores">Automotores</option>
              <option value="oficios ofrecidos">Oficios ofrecidos</option> 
              <option value="servicios">Servicios</option>
              <option value="legales">Legales</option>
              <option value="veterinarias">Veterinarias</option>
              <option value="jardineria y viveros">Jardineria y viveros</option> 
              <option value="compra y venta de articulos">Compra y venta de articulos</option>
              <option value="varios">Varios</option>          


            </select>


          </div>

        <!-- Caracteristica del clasificado -->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

              <i class="fas fa-pencil-alt" aria-hidden="true"></i>

            </div>

            <input type="text" class="form-control caracteristicaClasificado" name="caracteristicaClasificado" placeholder="Ingrese título del clasificado" maxlength="60" value="" required=""> 

          </div> 


         <div class="input-group mb-3">

         <!-- Seleccionar Operacion -->

            <div class="input-group-append input-group-text">
              <i class="fas fa-list-ul" aria-hidden="true"></i>
            </div>

            <select class="form-control" name="operacionClasificado" required="">

              <option value="">Elige operación</option>
              <option value="Compra">Compra</option>
              <option value="Venta">Venta</option>
              <option value="Pedido">Pedido</option> 
              <option value="Ofrecido">Ofrecido</option>
              <option value="Alquiler ofrecido">Alquiler ofrecido</option>
        
            </select>

          </div>


          <div class="row">

            <!-- Seleccionar Dia-->
            <div class="input-group col-6 mb-3">

              <div class="input-group-append input-group-text">
                <i class="fas fa-list-ul" aria-hidden="true"></i>
              </div>

              <select class="form-control" name="diaClasificado" required="" >

                <option value="">Día</option>
                <option value="Lunes">Lunes</option>
                <option value="Martes">Martes</option>
                <option value="Miercoles">Miercoles</option> 
                <option value="Jueves">Jueves</option>
                <option value="Viernes">Viernes</option>
                <option value="Sabado">Sabado</option>
                <option value="Domingo">Domingo</option>

              </select>

            </div>

          </div>

          <div class="input-group mb-3">
                            
                <div class="input-group-append">
                  
                  <span class="input-group-text">Detalles del Clasificado</span>

                </div>

                <textarea class="form-control" rows="3" name="detallesClasificado" maxlength="500" style="margin-top: 0px; margin-bottom: 0px; height: 129px;"></textarea>

          </div>

        <div class="container">
          
              <div class="col-12">

                <div class=" my-4 " >

                  <p>Copiar y pegar para vincular una palabra (Hipervínculo)</p>

                  <p> <pre class="lang:default decode:true">&lt;a href=´http://www.hornense.com/´ target=´_blank´ &gt;Palabra a vincular&lt;/a&gt;</pre> </p>

                </div>
      
          </div>         
          
        </div>


          <hr class="pb-2">

          <!--================================================
          =            CARGANDO Imagen de Clasificado    =
          =================================================-->

          <div class="form-group my-2 text-center">

            <div class="btn btn-default btn-file">

              <i class="fas fa-paperclip" aria-hidden="true"></i> Clasificado

              <input type="file" class="subirClasificado" name="subirClasificado" >

            </div>

           <!--  <img class="previsualizarClasificado img-fluid py-2"> -->

           <div id="previsualizarClasificado"></div>

            <p class="help-block small">Peso Max. 2MB | Formato: JPG, PNG o GIF</p>

          </div>

          <hr class="pb-2">


          <label>Url de la imagen: Ejemplo: https://www.hornense.com</label>

          
          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

              <i class="fas fa-pencil-alt" aria-hidden="true"></i>

            </div>
             
            <input type="text" class="form-control " name="urlClasificado" placeholder="EJEMPLO: https://www.hornense.com" value=""> 

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

             $registroClasificado = new ControladorClasificados();
             $registroClasificado -> ctrRegistroClasificado();
        ?>

      </form>

    </div>

  </div>

</div>



<!--=====================================
Editar Clasificado
======================================-->

<div class="modal" id="editarClasificado">

  <div class="modal-dialog ">

    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <div class="modal-header bg-info">

          <h4 class="modal-title">Editar Clasificado</h4>

          <button type="button" class="close" data-dismiss="modal">×</button>

        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <input type="hidden" class="form-control" name="idClasificado"><!-- aqui se captura el id con js para llevarlo al controlador -->

          <div class="input-group mb-3">

         <!-- Seleccionar Categoria -->

            <div class="input-group-append input-group-text">
              <i class="fas fa-list-ul" aria-hidden="true"></i>
            </div>

            <select class="form-control" name="editarSelecCategoriaClasificado">

              <option class="editarCategoriaOptionClasificado"></option>

              <option value="inmuebles">Inmuebles</option>
              <option value="empleos">Empleos</option>
              <option value="transporte y fletes">Transporte y fletes</option> 
              <option value="salud">Salud</option>
              <option value="automotores">Automotores</option>
              <option value="oficios ofrecidos">Oficios ofrecidos</option> 
              <option value="servicios">Servicios</option>
              <option value="legales">Legales</option>
              <option value="veterinarias">Veterinarias</option>
              <option value="jardineria y viveros">Jardineria y viveros</option> 
              <option value="compra y venta de articulos">Compra y venta de articulos</option>
              <option value="varios">Varios</option>          


            </select>


          </div>

        <!-- Caracteristica del clasificado -->

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

              <i class="fas fa-pencil-alt" aria-hidden="true"></i>

            </div>

            <input type="text" class="form-control editarCaracteristicaClasificado" name="editarCaracteristicaClasificado" placeholder="Ingrese titulo del clasificado" value="" maxlength="60" required=""> 

          </div> 


         <div class="input-group mb-3">

         <!-- Seleccionar Operacion -->

            <div class="input-group-append input-group-text">
              <i class="fas fa-list-ul" aria-hidden="true"></i>
            </div>

            <select class="form-control" name="editarOperacionClasificado" required="">

              <option class="editarOperacionOption"></option>

              <option value="Compra">Compra</option>
              <option value="Venta">Venta</option>
              <option value="Pedido">Pedido</option> 
              <option value="Ofrecido">Ofrecido</option>
              <option value="Alquiler ofrecido">Alquiler ofrecido</option>
        
            </select>

          </div>


          <div class="row">

            <!-- Seleccionar Dia-->
            <div class="input-group col-6 mb-3">

              <div class="input-group-append input-group-text">
                <i class="fas fa-list-ul" aria-hidden="true"></i>
              </div>

              <select class="form-control" name="editarDiaClasificado" required="">

               <option class="editarDiaOption"></option>
                <option value="Lunes">Lunes</option>
                <option value="Martes">Martes</option>
                <option value="Miercoles">Miercoles</option> 
                <option value="Jueves">Jueves</option>
                <option value="Viernes">Viernes</option>
                <option value="Sabado">Sabado</option>
                <option value="Domingo">Domingo</option>

              </select>

            </div>

          </div>



          <div class="input-group mb-3">
                            
                <div class="input-group-append">
                  
                  <span class="input-group-text">Detalles del Clasificado</span>

                </div>

                <textarea class="form-control" rows="3" name="editarDetallesClasificado" maxlength="500" style="margin-top: 0px; margin-bottom: 0px; height: 129px;"></textarea>

          </div>


          <div class="container">
          
              <div class="col-12">

                <div class=" my-4 " >

                  <p>Copiar y pegar para vincular una palabra (Hipervínculo)</p>

                  <p> <pre class="lang:default decode:true">&lt;a href=´http://www.hornense.com/´ target=´_blank´ &gt;Palabra a vincular&lt;/a&gt;</pre> </p>

                </div>
      
          </div>         
          
        </div>


          <hr class="pb-2">

          <!--================================================
          =            CARGANDO Imagen de Clasificado    =
          =================================================-->

          <div class="form-group my-2 text-center">

            <div class="btn btn-default btn-file">

              <i class="fas fa-paperclip" aria-hidden="true"></i> Cambiar imagen clasificado

              <input type="file" class="editarSubirClasificado" name="editarSubirClasificado" >

              <input type="hidden" name="subirClasificadoActual">

            </div>
            
            <div id="editarPrevisualizarClasificado"></div>   

             <div class="col-12  car px-3 rounded-0 shadow-none">

                   <img class="editarPrevisualizarClasificado img-fluid py-2">    
                  <!-- <img class="card-img-top" src="`+rutaImagen+`"> -->
                      <div class="card-img-overlay p-0 pr-3">
                        
                         <button class="btn btn-danger btn-sm float-right shadow-sm quitarFotoViejaClasificado" >
                           
                           <i class="fas fa-times"></i>

                         </button>

                      </div>                 
                  </div>



            <p class="help-block small">Peso Max. 2MB | Formato: JPG, PNG o GIF</p>

          </div>

          <hr class="pb-2">


          <label>Url de la imagen: Ejemplo: https://www.hornense.com</label>

          
          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

              <i class="fas fa-pencil-alt" aria-hidden="true"></i>

            </div>
             
            <input type="text" class="form-control " name="editarUrlClasificado" placeholder="EJEMPLO: https://www.hornense.com" value="" > 

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

             $editarClasificado = new ControladorClasificados();
             $editarClasificado -> ctrEditarClasificado();
        ?>

      </form>

    </div>

  </div>

</div>


